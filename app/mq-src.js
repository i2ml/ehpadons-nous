var Media = require('./media');

// @TODO refactor

if(Media.media == 'desktop') {
  $('[desktop-src]').each(function(key, elem) {
    let src = $(elem).attr('desktop-src');
    $(elem).attr('src', src);
  });
}

else if(Media.media == 'large') {
  $('[large-src]').each(function(key, elem) {
    let src = $(elem).attr('large-src');
    $(elem).attr('src', src);
  });
} 

else if(Media.media == 'mobile') {
  $('[mobile-src]').each(function(key, elem) {
    let src = $(elem).attr('mobile-src');
    $(elem).attr('src', src);
  });
}
