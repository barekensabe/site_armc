jQuery(document).ready(function($){
	
	//facebook share
/*(function(d, s, id) {
  var js, fjs = d.getElementsByTagName(s)[0];
  if (d.getElementById(id)) return;
  js = d.createElement(s); js.id = id;
  js.src = "//connect.facebook.net/en_US/sdk.js#xfbml=1&version=v2.6";
  fjs.parentNode.insertBefore(js, fjs);
}(document, 'script', 'facebook-jssdk'));
*/	
		
	if (window.location.pathname == "/bank-notes/bank-notes-25" || window.location.pathname =="/bank-notes-coins/bank-notes/virtual-museum")
	{
		$("img").on("contextmenu",function(e){
		   return false;
		}); 
	}
	
	
	//display currency converter form on mouseover and hide it on mouseout
	$("#block-currency-converter-bom-currency-conversion h2").append("<div class='arrowCur'></div>");
	$("#block-currency-converter-bom-currency-conversion h2").click(function() {
		$("#currency-converter-bom-form").slideToggle("slow");
		$("div.arrowCur").toggleClass("toggle");
	});

	// prettyphoto gallery
	$("area[rel^='prettyPhoto']").prettyPhoto();
	// new WOW().init();
	$(".view-photo-gallery .view-content .views-row:first a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'normal',theme:'light_square',slideshow:6000,autoplay_slideshow: false});
	$(".view-photo-gallery .view-content .views-row:gt(0) a[rel^='prettyPhoto']").prettyPhoto({animation_speed:'fast',slideshow:10000, hideflash: true});

	//display only one picture per node
	$(".view-photo-gallery .view-content .views-row .views-column .views-field-field-bom-gallery-images .field-content a:not(:first)").hide();

	$( ".view-photo-gallery .view-content .views-row .views-column").each(function( index ) {
	  $( this ).find("a").eq(0).css("display","block") ;
	});
	
	var count = $('.view-photo-gallery .views-field-field-bom-gallery-images .field-content').find('a').length;
	//console.log(count);
	if(count == 1){
		$('.view-photo-gallery .views-field-field-bom-gallery-images .field-content a').attr('rel', 'prettyPhoto');
		// $(".pp_hoverContainer").css("display", "none");
	}

	(function ($) {  
	  // Go back button
	  $('a.backButton').click(function(){
	     parent.history.back();
	     return false;
	  });
	})(jQuery);
	
		
	
	
	// add target blank for download
	
	$(".download-file a, .field-name-field-pdf-link a").attr('target', '_blank');
	
	//Security features
	$(function() {
		$(".firstImgBack").hide();
		$(".allcurrencies").hide();
		$(".security-description").css("display", "none");
		$(".firstImgFront").addClass("active");
		$("#firstImgTurn").click(function() {
			if($(".firstImgFront").hasClass("active")){
				$(".firstImgFront").css("display", "none");
				$(".firstImgFront").addClass("noteTransition");
				$(".firstImgBack").addClass("noteTransition");
				$(".firstImgBack").css("display", "block");
				$(".firstImgBack").addClass("active");
				$(".firstImgFront").removeClass("active");
			}
			else if($(".firstImgBack").hasClass("active")){
				$(".firstImgBack").css("display", "none");
				$(".firstImgBack").addClass("noteTransition");
				$(".firstImgFront").addClass("noteTransition");
				$(".firstImgFront").css("display", "block");
				$(".firstImgFront").addClass("active");
				$(".firstImgBack").removeClass("active");
			}
		});
		//When user clicks on bank note thumbnail
		$('.thumbnail').on('click', function(){
			var nid = $(this).attr("id");
			dispCur = "#displayCurrency_"+nid;
			var data = $(dispCur).html();
			$('.currencies').html(data);
			imgBack = ".museumImgBack_"+nid;
			imgFront = ".museumImgFront_"+nid;
			$(imgBack).hide();
			$(imgFront).addClass("active");
			//Code to turn bank notes
			$(".inverseArrow").click(function() {
				var id = $(this).attr("id");
				backImg = ".museumImgBack_"+id;
				frontImg = ".museumImgFront_"+id;
				if($(frontImg).hasClass("active")){
					$(frontImg).removeClass("active");
					$(frontImg).css("display", "none");
					$(frontImg).addClass("noteTransition");
					$(backImg).addClass("noteTransition");
					$(backImg).css("display", "block");
					$(backImg).addClass("active");
				}
				else if($(backImg).hasClass("active")){
					$(frontImg).addClass("active");
					$(backImg).css("display", "none");
					$(frontImg).addClass("noteTransition");
					$(backImg).addClass("noteTransition");
					$(frontImg).css("display", "block");
					$(backImg).removeClass("active");
				}
			});
			//Display security features details
			$('.special-feature li').on('click', function(){
				id = $(this).attr("class");
				noteBack = ".museumImgBack_"+nid;
				if($(noteBack).hasClass("active")){
					$(frontImg).addClass("active");
					$(backImg).css("display", "none");
					$(frontImg).addClass("noteTransition");
					$(backImg).addClass("noteTransition");
					$(frontImg).css("display", "block");
					$(backImg).removeClass("active");
				}
				secFeature = ".feature_tid"+id;
				secDesc = $(secFeature).html();
				$('.secDesc').html(secDesc);
			});
		});
	});
	
	//Display security features details for first bank note appearing on load of the page
	$('.special-feature li').on('click', function(){
		id = $(this).attr("class");
		noteBack = $("#firstImgBack");
		noteFront = $("#firstImgFront");
		if($(noteBack).hasClass("active")){
			//console.log("has active");
			$(noteFront).addClass("active");
			$(noteBack).css("display", "none");
			$(noteFront).addClass("noteTransition");
			$(noteBack).addClass("noteTransition");
			$(noteFront).css("display", "block");
			$(noteBack).removeClass("active");
		}
		secFeature = ".feature_tid"+id;
		secDesc = $(secFeature).html();
		$('.secDesc').html(secDesc);
		animateSec = ".featureImg_"+id;
		$(animateSec).css("display", "block");
		$(animateSec).addClass("secFeatures");
	});


	//reverse effect for ecommerce products
	$( ".view-ecommerce .views-column" ).hover(
	  function() {
	    $( this ).find(".views-field-field-image-obverse,").css('display','none') ;
	    $( this ).find(".views-field-field-image-reverse").css('display','block') ;
	    
	  }, function() {
	    $( this ).find(".views-field-field-image-reverse").css('display','none') ;
	    $( this ).find(".views-field-field-image-obverse").css('display','block') ;
	  }
	);


	//reverse effect for store
	$( ".view-store .views-column" ).hover(
	  function() {
	    $( this ).find(".views-field-field-store-products-img-obv").css('display','none') ;
	    $( this ).find(".views-field-field-store-products-img-rev").css('display','block') ;
	    
	  }, function() {
	    $( this ).find(".views-field-field-store-products-img-rev").css('display','none') ;
	    $( this ).find(".views-field-field-store-products-img-obv").css('display','block') ;
	  }
	);
	
	
	
	// execute this code if ajax has been used
	$( document ).ajaxComplete(function( event,request, settings ) {		
	  $( ".view-ecommerce .views-column" ).hover(
		  function() {
		    $( this ).find(".views-field-field-image-obverse").css('display','none') ;
		    $( this ).find(".views-field-field-image-reverse").css('display','block') ;
		    
		  }, function() {
		    $( this ).find(".views-field-field-image-reverse").css('display','none') ;
		    $( this ).find(".views-field-field-image-obverse").css('display','block') ;
		  }
		);
				
		//reverse effect for store
		$( ".view-store .views-column" ).hover(
		  function() {
		    $( this ).find(".views-field-field-store-products-img-obv").css('display','none') ;
		    $( this ).find(".views-field-field-store-products-img-rev").css('display','block') ;
		    
		  }, function() {
		    $( this ).find(".views-field-field-store-products-img-rev").css('display','none') ;
		    $( this ).find(".views-field-field-store-products-img-obv").css('display','block') ;
		  }
		);
		
	});
	
	$( "#job-application-entityform-edit-form .captcha" ).insertBefore( $( "#job-application-entityform-edit-form #edit-actions" ) );
	
	
	
	
	//virtual museum flip after 3000 delay
	
	setTimeout(function() {   //calls click event after a certain time
		$(".vm-notes").flip({
		  trigger: 'manual'
		});
		
		 $(".flip-front-vr").click(function() {
		  $(".vm-notes").flip(false);
		  //$(this).parent().flip(false);
		});
		
		$(".flip-back-vr").click(function() {
		  $(".vm-notes").flip(true);
		  //$(this).parent().flip(true);
		});
	}, 3000);
	
	//virtual museum flip after 6000 delay
	
	setTimeout(function() {   //calls click event after a certain time
		$(".vm-notes").flip({
		  trigger: 'manual'
		});
		
		 $(".flip-front-vr").click(function() {
		  $(".vm-notes").flip(false);
		  //$(this).parent().flip(false);
		});
		
		$(".flip-back-vr").click(function() {
		  $(".vm-notes").flip(true);
		  //$(this).parent().flip(true);
		});
	}, 6000);
	
	
	
	$( "#email-alerts-node-form .captcha" ).insertBefore( $( "#email-alerts-node-form #edit-actions" ) );

	//adding text align for key indicators table
	$(".views-matrix td").each(function(){
		$(this).css("text-align", "right");
	});
	
	//Key Indicators Export to excel
	$("#key-indicators-export").click(function(){
		$(".views-matrix").table2excel({
			name: "Statistical Key Indicators",
			filename: "key_indicators" //do not include extension
		});
	});
	
	
	// //Consolidated Indicative Rates export to excel
	// $("#consolidated-export").click(function(){
		// $(".views-table").table2excel({
			// name: "Consolidated Indicative Rates",
			// filename: "consolidated_indicative_rates" //do not include extension
		// });
	// });
	
	//Consolidated Indicative Rates export to excel
	$("#consolidated-export").click(function(){
		$(".view-display-id-attachment_1 .views-table").table2excel({
			name: "Consolidated Indicative Rates",
			filename: "consolidated_indicative_rates" //do not include extension
		});
	});
});

