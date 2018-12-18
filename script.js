$(document).ready( function () {
	/*$(".card-img-top").mouseover(function() {
		this.animate({width: '250px'});
	});
	$(".card-img-top").mouseout(function() {
		this.src="14.jpg";
	});*/
	$('.fader').mouseover(function() {
		$(this).animate({opacity: 0}, 'fast', function() {
        $(this)
            .css({'background-image': 'url(14_hover.jpg)'})
            .animate({opacity: 1});
    	});
	});

	$('.fader').mouseout(function() {
		$(this).animate({opacity: 0},'fast', function() {
        $(this)
            .css({'background-image': 'url(14.jpg)'})
            .animate({opacity: 1});
    	});
	});
});