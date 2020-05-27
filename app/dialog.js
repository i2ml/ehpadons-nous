/* DIALOG */
/* --------------------------------------------------------------------------------- */

let $dialogContainer = $('#dialog');
let $dialogBody = $('#dialog .dialog-body');

$('body').on('click', '[data-dialog="open"]', function(e) {
  e.preventDefault();

  var href = $(this).attr('href') ? $(this).attr('href') : $(this).data('href');
  if(href.startsWith('#')) {
    openDialog($(href).html());
  } else {
    $.get(href).then(openDialog);
  }

});

$('body').on('click', '[data-dialog="close"]', function(e) {
  e.preventDefault();
  closeDialog();
});

$(document).keyup(function(e){
  if(e.keyCode === 27) closeDialog();
});

function openDialog(html) {
  console.log(html);
  $dialogBody.html(html);
  $dialogContainer.addClass('visible');
}

function closeDialog() {
  if($('.dialog-back').length) {
    return window.location = $('.dialog-back').attr('href');
  }
  $('#dialog').removeClass('visible');
}
