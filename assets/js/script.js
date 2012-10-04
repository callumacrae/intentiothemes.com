$('nav').on('click', 'a[href^="#"]', function (e) {
	e.preventDefault();

	var hash = '#' + this.href.split('#')[1],
		offset = $(hash).offset().top;

	$(document.body).animate({scrollTop: offset}, 200, function () {
		location.hash = hash;
	});
});

$('form p').hide();
$('form').submit(function (e) {
	e.preventDefault();

	var data = $(this).serialize(),
		p = $(this).find('p');

	if (this.name.value && this.email.value && this.message.value) {
		$.post('contact.php', data, function (body) {
			if (body === false) {
				body = 'Failed to send. Please try again later';
			} else if (body === true) {
				body = 'Successfully sent. Thanks.';
			}

			p.text(body).show();
		});
	} else {
		p.text('Please complete all inputs').show();
	}
});
