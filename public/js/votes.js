$(document).ready(function() {
	$('.vote').on('click', function() {
		if ($('#is-logged-in').val() == '1') {
			var data = {
				_token: $('#csrf-token').val(),
				vote: $(this).data('vote'),
				post_id: $(this).data('postId')
			};

			var url = $('#vote-url').val();

			var callback = function(data) {
				console.log(data.vote_score);
				$('#vote-score').text(data.vote_score);
				$('.vote').removeClass('active');
				$('[data-vote="' + data.vote + '"]').addClass('active');
			}

			doAjax(url, "POST", data, callback);
		}
	})
})