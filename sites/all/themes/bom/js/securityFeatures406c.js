jQuery(document).ready(function($){
	
//Kris ====================================================|
	
	if ($(".featureImg_9").length) {
    	$( ".flash9" ).appendTo( ".getCurPos" );
	}
	if ($(".featureImg_15").length) {
    	$( ".flash15" ).appendTo( ".getCurPos" );
	}
	if ($(".featureImg_12").length) {
    	$( ".flash12" ).appendTo( ".getCurPos" );
	}
	if ($(".featureImg_13").length) {
    	$( ".flash13" ).appendTo( ".getCurPos" );
	}
	if ($(".featureImg_11").length) {
    	$( ".flash11" ).appendTo( ".getCurPos" );
    }
	if ($(".featureImg_10").length) {
    	$( ".flash10" ).appendTo( ".getCurPos" );
    }
	if ($(".featureImg_14").length) {
    	$( ".flash14" ).appendTo( ".getCurPos" );
	}

	//Kris ================25====================================|

	$(".card25").flip({
	  axis: 'y',
	  trigger: 'click'
	});

	$(".card25").flip({
	  axis: 'y',
	  trigger: 'manual'
	});
	$(".flip-front-25").click(function(){
    	$(".card25").flip(true);
    });

    $(".flip-back-25").click(function(){
    	$(".card25").flip(false);
    });

    //flip active

    
	$(".flip-back-25").click(function(){
	    $(this).siblings().removeClass('active');
	    $(this).addClass('active');
	});
	
	$(".flip-front-25").click(function(){
	    $(this).siblings().removeClass('active');
	    $(this).addClass('active');
	});

    //watermark
    $( ".watermark25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$(".watermarkhidetext25").slideToggle("slow");
		$(".watermarkhideimage25").slideToggle("slow");
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoWatermark25").toggleClass("bttnfotoWatermark25Toggle");
	});
	//seethru
    $( ".seethru25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".seethruhidetext25" ).slideToggle( "slow" );
		$( ".seethruhideimage25" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoSeethru25").toggleClass("bttnfotoSeethru25Toggle");
	});
	//security
    $( ".security25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".securityhidetext25" ).slideToggle( "slow" );
		$( ".securityhideimage25" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoSecurity25").toggleClass("bttnfotoSecurity25Toggle"); 
	});
	//latent
    $( ".latent25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".latenthidetext25" ).slideToggle( "slow" );
		$( ".latenthideimage25" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoLatent25").toggleClass("bttnfotoLatent25Toggle"); 
	});
	//watermark
    $( ".micro25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".microhidetext25" ).slideToggle( "slow" );
		$( ".microhideimage25" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoMicro25").toggleClass("bttnfotoMicro25Toggle"); 
	});
	//uv
    $( ".uv25" ).click(function() {
    	$(".card25").flip(false);
    	$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".uvhidetext25" ).slideToggle( "slow" );
		$( ".uvhideimage25" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoUv25").toggleClass("bttnfotoUv25Toggle");
	});
	//100

	$( ".metalink100" ).click(function() {
		$(".card25").flip(false);
		$(this).siblings().removeClass('active');
        $(this).addClass('active');

    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".metalinkhidetext100" ).slideToggle( "slow" );
		$( ".metalinkhideimage100" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoMetalink100").toggleClass("bttnfotoMetalink100Toggle");
	});

	$( ".iriband100" ).click(function() {
		$(".card25").flip(true);
		$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".iribandhidetext100" ).slideToggle( "slow" );
		$( ".iribandhideimage100" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoIriband100").toggleClass("bttnfotoIriband100Toggle");
	});
	//intagliink
	$( ".intagink" ).click(function() {
		$(".card25").flip(false);
		$(this).siblings().removeClass('active');
        $(this).addClass('active'); 
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".inkhidetext2000" ).slideToggle( "slow" );
		$( ".inkhideimage2000" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoInk2000").toggleClass("bttnfotoInk2000Toggle");
	});
	

		//polymer2000
	$( ".polymer2000" ).click(function() {
		$(".card25").flip(false);
		$(this).siblings().removeClass('active');
        $(this).addClass('active'); 
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".polymer2000" ).slideToggle( "slow" );
		//$( ".inkhideimage2000" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		//$(".bttnfotoInk2000").toggleClass("bttnfotoInk2000Toggle");
	});
	
	//
	
	$( ".silver500" ).click(function() {
		$(".card25").flip(false);
		$(this).siblings().removeClass('active');
        $(this).addClass('active'); 
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".silverhidetext500" ).slideToggle( "slow" );
		$( ".silverhideimage500" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoSilver500").toggleClass("bttnfotoSilver500Toggle");
	});
	$( ".hologram2000" ).click(function() {
		$(".card25").flip(false);
		$(this).siblings().removeClass('active');
        $(this).addClass('active');
    	$( ".displayinfo div" ).each(function( index ) {
		  if($(this).css('display') == 'block')
		 	{
		 		$(this).css('display', 'none');
			}
		});
		$( ".hologramhidetext2000" ).slideToggle( "slow" );
		$( ".hologramhideimage2000" ).slideToggle( "slow" );
		$(".front25 button").each(function( index ) { $className =  $(this).attr('class').split(' ')[1]; $(this).removeClass($className)});
		$(".bttnfotoHologram2000").toggleClass("bttnfotoHologram2000Toggle");
	});

});
