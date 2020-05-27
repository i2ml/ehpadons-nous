$('[data-href]').on('click', function() {
	location.href = $(this).attr('data-href');
});