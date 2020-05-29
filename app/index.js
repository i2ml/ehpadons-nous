require('./datahref');
require('./mq-src');
require('./dialog');
const $clamp = require('clamp-js');
var Media = require('./media');

$(document).ready(function($) {

  setTimeout(function() {
    $('body').removeClass('loading');
  }, 1000)

  $('.glide').each(function() {
    let $elem = $(this);
    let perView = 'mobile' != Media.media ? ($elem.attr('data-perView') ? $elem.attr('data-perView') : 1) : 1;


    let glide = new Glide($elem.get(0), {
      perView: perView
    }).mount()

    setTimeout(function() {
      glide.update();
    }, 1000)

  });

  // scroll to
  $('a[href^="#"]').on('click', function(event) {
    var target = $(this.getAttribute('href'));
    if( target.length ) {
      event.preventDefault();
      $('html, body').stop().animate({
          scrollTop: target.offset().top - 150
      }, 1000);
    }
  });

  $('[data-clamp]').each((key,elem) => {
    $clamp(elem, {clamp: $(elem).attr('data-clamp')});
  });


})
