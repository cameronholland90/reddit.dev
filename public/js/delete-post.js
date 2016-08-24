$(document).ready(function() {
	$('.post-delete-link').on('click', function(e) {
		e.preventDefault();
		var action = $(this).attr('href');
		$('#post-delete-form').attr('action', action);
		$('#post-delete-form').submit();
	});
})