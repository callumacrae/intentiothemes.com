$('nav').on('click', 'a[href^="#"]', function (e) {
	e.preventDefault();

	var hash = '#' + this.href.split('#')[1],
		offset = $(hash).offset().top;

	$(document.body).animate({scrollTop: offset}, 200, function () {
		location.hash = hash;
	});
});
