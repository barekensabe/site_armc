var q = jQuery.noConflict();
q(document).ready(function($) {
	$('.block-activeline-customization .menu .has-children').click(function(e){
		//event.preventDefault();
		// $.Event(e).preventDefault();
		var next_ul = $(this).next();
		$(next_ul).animate({
            height: 'toggle'
        });
		if($(next_ul).hasClass('in')){
			$(next_ul).removeClass('in');
			$(this).find('span.glyphicon').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top');
		}
		else {
			$(next_ul).addClass('in');
			$(this).find('span.glyphicon').toggleClass('glyphicon-triangle-bottom glyphicon-triangle-top');
		}
	});
});