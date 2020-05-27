'use strict';
var gulp = require('gulp');
var sass = require('gulp-sass');
var prefix = require('gulp-autoprefixer');
var rename = require('gulp-rename');
var svgstore = require('gulp-svgstore');
var inject = require('gulp-inject');
var svgmin = require('gulp-svgmin');
var argv = require('yargs').argv;
var template = require('gulp-template');
var source = require('vinyl-source-stream');
var gulpif = require('gulp-if');

var xtend = require('xtend');
var browserify = require('browserify');
var browserifyInc = require('browserify-incremental');

var execSync = require('child_process').execSync,
    commitHash = execSync('git log -n 1', {'encoding': 'UTF8'});


var paths = {
    sass: 'sass/{,*/}*.scss',
    svgs: 'svg/*.svg'
};

// append ?noCache=<hash-from-git-commit> on app.js and app.css files
var noCache = "?noCache=" + commitHash.split("\n")[0].split(" ")[1].substring(0,8);

// browserify
var debug = !argv.env || 'prod'.indexOf(argv.env) == -1;
debug = false;
var bundler = browserify(xtend(browserifyInc.args, {
  debug: debug
}));
var watching = false;

bundler.add('app/index.js');
browserifyInc(bundler, {cacheFile: './cache/browserify-cache.json'});

gulp.task('browserify', function() {
  return bundler.bundle()
    .on('error', onError)
    .pipe(source('app.js'))
    //.pipe(gulpif(!debug, streamify(uglify())))
    .pipe(gulp.dest(''));
    // .pipe(gulpif(watching, reload({ stream: true })));
});


gulp.task('sass', function() {
    return gulp.src('sass/index.scss')
        .pipe(sass({
            sourceComments: 'none'
        }))
        .on('error', onError)
        .pipe(prefix(['last 2 versions', 'ie >= 10']))
        .pipe(rename('app.css'))
        .pipe(gulp.dest(''));
});

gulp.task('svgstore', function() {
  var svgs = gulp
    .src(paths.svgs)
    .pipe(rename({prefix: 'icon-'}))

    // problem with generated SVG that will not follow the stroke
    // .pipe(svgmin({
    //   plugins: [
    //   	{
    //   		cleanupIDs: {
    //             prefix: prefix + '-',
    //             minify: true
    //         }
    //     },
    //   	{
    //   		removeTitle: true
    //   	}, {
    //   		removeDesc: true
    //   	}
    //   ]
    // }))
    .pipe(svgstore({ inlineSvg: true }));

  function fileContents(filePath, file) {
    return file.contents.toString();
  }

  return gulp
    .src('footer.php')
    .pipe(inject(svgs, { transform: fileContents }))
    .pipe(template({ killCache: noCache }))
    .pipe(rename('footer-compiled.php'))
    .pipe(gulp.dest(''));
});

gulp.task('headercache', function() {
  return gulp
    .src('header.php')
    .pipe(template({ killCache: noCache }))
    .pipe(rename('header-compiled.php'))
    .pipe(gulp.dest(''));
});


gulp.task('default', ['headercache','sass','svgstore', 'browserify'], function() {
    gulp.watch(paths.sass, ['sass']);
    gulp.watch([paths.svgs, 'footer.php'], ['svgstore']);
    gulp.watch(['header.php'], ['headercache']);
    gulp.watch('app/{,*/}*.js', ['browserify']);
});



/**
 * Utils.
 */

var gutil = require('gulp-util');
var notify = require('gulp-notify');
var isStream = require('isstream');
var os = require('os');

function onError() {
	var args = Array.prototype.slice.call(arguments);

	// error to notification center with gulp-notify
	if ('win32' != os.platform()) {
		notify.onError({
			title: "Compile Error",
			message: "<%= error.message %>"
		}).apply(this, args);
	}
	else {
		gutil.log("Compile Error", args[0].message, gutil.colors.red);
	}

	// keep gulp from hanging on this task
	if (isStream(this)) this.emit('end');
}