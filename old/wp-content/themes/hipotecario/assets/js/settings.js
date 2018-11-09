(function($){
	"use strict";

	$(document).ready(function(){

		new WOW().init();

		var bcolor = "#0360a4";


		if( jQuery("#menu-footer-menu").length )
		{

			var f = jQuery("#footer-social").html();
			jQuery(".footer-menu").append("<li>"+f+"</li>");

		}

		if( jQuery(".page-template-template-flipbook-1page").length )
		{

			jQuery("#loading-file").addClass("hidden");
			jQuery(".bg-img").removeClass("hidden");

		}
		
		/*
		$.ajax({
			type: "GET",
			url: "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=10&playlistId=PLvxFcP6xmnceFxcWQzaIcGgNzFLu6S47N&key=AIzaSyAGs1RzRvtzmhwRdETTMo6Zj5JUeob_62Q",
			data: "action=gi_receiveformcontacto&"+jQuery("form.contacto-bh").serialize(),
			dataType : 'json',
			success: function(data) {

				jQuery.each( data.items, function( i, item ) {
					//alert("video");
					//$('#results').append('<li>https://www.youtube.com/embed/' + item.id.videoId + '</li>');
					console.log('<li>https://www.youtube.com/embed/' + item.id.videoId + '</li>');
				});

			},
            error: function (data) {

            	console.log("error");
            }
		});


		jQuery.get(
			"https://www.googleapis.com/youtube/v3/search",{
			part : 'snippet', 
			channelId : 'UCeYtqmVbsT_JLxHbk6FLrsA', // You can get one from Advanced settings on YouTube
			type : 'video',
			key: 'YOUR_KEY'},
			function(data) {
				jQuery.each( data.items, function( i, item ) {
					alert("video");
					$('#results').append('<li>https://www.youtube.com/embed/' + item.id.videoId + '</li>');
				})
			}
		);

		*/

		if( jQuery(".openimage").length )
		{

			jQuery(".openimage").fancybox();

		}

		if(jQuery(".page-template-template-home").length)
		{

			jQuery("#homelinks").slick({
				dots: false,
		        infinite: false,
		        slidesToShow: 3,
		        slidesToScroll: 1,
		        arrows: true,
		        responsive: [
		        	{
					    breakpoint: 1900,
					  	settings:"unslick"
				    },
				  	{
					    breakpoint: 1600,
					  	settings:"unslick"
				    },
				  	{
					    breakpoint: 1400,
					  	settings:"unslick"

				    },
				  	{
					    breakpoint: 1280,
					  	settings:"unslick"

				    },
				    {
				      breakpoint: 1101,
				      settings: {
				        slidesToShow: 3
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 2
				      }
				    },
				    {
				      breakpoint: 550,
				      settings: {
				        slidesToShow: 1
				      }
				    }
				]
			});

		}

		if(jQuery(".page-template-template-subpaginas-cuadricula").length)
		{

			jQuery("#subpages").slick({
				dots: false,
		        infinite: false,
		        slidesToShow: 4,
		        slidesToScroll: 1,
		        arrows: true,
		        responsive: [
		        	{
					    breakpoint: 1900,
					  	settings:"unslick"
				    },
				  	{
					    breakpoint: 1600,
					  	settings:"unslick"
				    },
				  	{
					    breakpoint: 1400,
					  	settings:"unslick"

				    },
				  	{
					    breakpoint: 1280,
					  	settings:"unslick"

				    },
				    {
				      breakpoint: 992,
				      settings: {
				        slidesToShow: 3
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 2
				      }
				    },
				    {
				      breakpoint: 550,
				      settings: {
				        slidesToShow: 2
				      }
				    }
				]
			});

		}
		
		if(jQuery(".scrolldown.home-goto-agropyme").length)
		{

			jQuery(".scrolldown.home-goto-agropyme").click(function(){
				$('#servicios-agropyme').animatescroll({scrollSpeed:2000,padding:0});
			});

		}

		if(jQuery(".datepicker").length)
		{

			$('.datepicker').datepicker({
			    format: 'dd/mm/yyyy'
			});

		}
		
		if(jQuery(".agropymelist").length)
		{

			jQuery(".agropymelist").removeClass("hidden");

		}

		if(jQuery("#videobackg").length)
		{
			//var hwindow = jQuery( window ).height();
			//jQuery('#videobackg').css("height","450px");
			//body.page-template-template-home-agropyme
			//jQuery('#videobackg').tubular({videoId: 'F0FjE1sW4-c'});
			//Rk6_hdRtJOE
			
			
			$('#videobackg').YTPlayer({
			    fitToBackground: true,
			    videoId: 'DNBTQBv9xSY',
			    playerVars: {
			    	autoplay: 1,
				    controls: 0,
				    showinfo: 0,
				    wmode: 'transparent'
			    }
			});
			
		}

		
		/*
		if( jQuery(".top-banner").length )
		{

			$.stellar({
				horizontalScrolling: false,
				verticalOffset: 40
			});

			$('.top-banner').stellar();

		}
		*/

		if( jQuery("a.beneficios").length )
		{

			$("a.beneficios").on('click', function() {
  
			  $.fancybox.open({
			    src  : '#beneficios',
			    type : 'inline',
			    maxWidth  : "500px"
			  });
			  
			});

		}

		resizeRightImages();

		function resizeRightImages()
		{
			var ww = $( window ).width();

			if( ww >= 768 )
			{

				$(".left-content").each(function(event){
					var hleft = $(this).height();
					var etarget = $(this).attr("data-targetimage");
					$(".image-"+etarget).css("height",hleft);
				});
			}
		}

		$( window ).resize(function() {

			resizeRightImages();

		});

		if( jQuery("form.contacto-bh").length )
		{

			jQuery("form.contacto-bh").validate({

				submitHandler: function(form) {
				    
				    event.preventDefault();

				    var email = jQuery("#email").val();

				    if(!validarEmail( email ))
				    {

				    	swal({   
				        title: "Email",   
				        text: "Ingresa una dirección de correo electrónico válida.",
				        showConfirmButton: true,
				        confirmButtonColor: bcolor }); 
				    	return false;
				        event.stopPropagation();
				    }

				    $.ajax({
						type: "POST",
						url: mycustomurl.my_ajax_url,
						data: "action=gi_receiveformcontacto&"+jQuery("form.contacto-bh").serialize(),
						dataType : 'json',
						success: function(msje) {

							swal({   
								type: msje.type,
						        title: msje.title,   
						        text: msje.message,
						        showConfirmButton: true,
						        confirmButtonColor: bcolor
						    }); 

							if(msje.type=="success"){
								jQuery("#contacto-bh").trigger("reset");
							}
						    
						    

						},
                        error: function (response) {

                        	swal({   
								type: msje.type,
						        title: msje.title,   
						        text: msje.message,
						        showConfirmButton: true,
						        confirmButtonColor: bcolor
						    }); 
                        }
					});

				}

			});

		}



















		if( jQuery("#gallery-list").length )
		{

			jQuery("#gallery-list li a").click(function(event){
				
				var i = jQuery(this).attr("data-largeimage");
				var t = jQuery(this).attr("data-titleimage");
				var d = jQuery(this).attr("data-descriptionimage");

				jQuery("#show-single-full-image-gallery").removeAttr("style");
				jQuery("#show-single-full-image-gallery").attr("style","background-image: url("+i+");");

				jQuery("#title-image").html();
				jQuery("#description-image").html();
				jQuery("#title-image").removeClass("hidden");
				jQuery("#description-image").removeClass("hidden");

				if(t.length){
					jQuery("#title-image").html(t);
				}else{
					jQuery("#title-image").addClass("hidden");
				}

				if(d.length){
					jQuery("#description-image").html(d);
				}else{
					jQuery("#description-image").addClass("hidden");
				}

				jQuery("#gallery-list li a").removeClass("active");
				jQuery(this).addClass("active");

			});

		}

		
		if(jQuery(".single-galeria").length)
		{

			setTimeout(function(){ 

				jQuery("#show-single-full-image-gallery").animatescroll();

			}, 1000);

		}

		if( jQuery("#gallery-list").length )
		{

			jQuery("#gallery-list").slick({
				dots: false,
		        infinite: false,
		        slidesToShow: 10,
		        slidesToScroll: 1,
		        arrows: true,
		        responsive: [
				    {
				      breakpoint: 1200,
				      settings: {
				        slidesToShow: 8
				      }
				    },
				    {
				      breakpoint: 991,
				      settings: {
				        slidesToShow: 6
				      }
				    },
				    {
				      breakpoint: 768,
				      settings: {
				        slidesToShow: 4
				      }
				    },
				    {
				      breakpoint: 550,
				      settings: {
				        slidesToShow: 3
				      }
				    }
				]
			});

		}

		/* soho

		width: 250px;
	    background: #fc3993;
	    border-radius: 0 0 10px 10px;
	    text-align: center;
	    position: absolute;
	    right: 0;
	    top: 29px;
	    z-index: 99;
	    color: white;
	    font-size: 19px;
	    padding: 10px 15px;

	    */

		function validarEmail( email ) {
		    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    if ( !expr.test(email) ){ return false; }else{ return true; }
		}


		if( jQuery(".single-image-file > a").length )
		{

			jQuery(".single-image-file > a").fancybox();

		}
		
		if( jQuery("form.form-send-cv").length )
		{

			jQuery("form.form-send-cv").validate({

				submitHandler: function(form) {
				    
				    event.preventDefault();

				    var email = jQuery("#correoelectronico").val();
				    var hojavida = jQuery("#datafilecv").val();

				    if(!validarEmail( email ))
				    {

				    	swal({   
				        title: "Email",   
				        text: "Ingresa una dirección de correo electrónico válida.",
				        showConfirmButton: true,
				        confirmButtonColor: bcolor }); 
				    	return false;
				        event.stopPropagation();
				    }

				    if( hojavida == "" )
				    {

				    	swal({   
				        title: "Hoja de vida",   
				        text: "Debes seleccionar tu hoja de vida",
				        showConfirmButton: true,
				        confirmButtonColor: bcolor }); 
				    	return false;
				        event.stopPropagation();
				    }

				    var form = jQuery("#form-send-cv")[0];
				    var fd = new FormData(form);
				    var file = jQuery(document).find('input[id="datafilecv"]');
				    var individual_file = file[0].files[0];
				    fd.append("file", individual_file);  
				    fd.append('action', 'gi_getcv');  

				    jQuery.ajax({
				        type: 'POST',
				        url: mycustomurl.my_ajax_url,
				        data: fd,
				        contentType: false,
				        processData: false,
				        success: function(response){

				            console.log(response);
				            if(response=="success")
				        	{

				        		swal({
					            	type: "success",
							        title: "Hoja de vida",   
							        text: "Hemos recibido tu hoja de vida, ya te encuentras en nuestra base de candidatos para futuras oportunidades.",
							        showConfirmButton: true,
							        confirmButtonColor: bcolor 
							    }); 

							    jQuery("form.form-send-cv").trigger("reset");

				        	}else if(response=="error"){

				        		swal({
					            	type: "warning",
							        title: "Hoja de vida",   
							        text: "Hemos tenido un inconveniente al recibir tu hoja de vida, por favor inténtalo de nuevo.",
							        showConfirmButton: true,
							        confirmButtonColor: bcolor 
							    }); 

				        	}else if(response=="errorext"){

				        		swal({
					            	type: "warning",
							        title: "Hoja de vida",   
							        text: "Únicamente se permiten hojas de vida con las siguientes extensiones: .pdf, .docx, .doc, por favor selecciona nuevamente un archivo con la extensión permitida.",
							        showConfirmButton: true,
							        confirmButtonColor: bcolor 
							    }); 

				        	}

				        },
                        error: function (response) {

                        	swal({
				            	type: "warning",
						        title: "Hoja de vida",   
						        text: "Hemos tenido un inconveniente al recibir tu hoja de vida, por favor inténtalo de nuevo.",
						        showConfirmButton: true,
						        confirmButtonColor: bcolor 
						    }); 

                        }
				    });



				    /*
					$.ajax({
						type: "POST",
						url: mycustomurl.my_ajax_url,
						data: "action=gi_getcv&"+jQuery("form.form-send-cv").serialize(),
						dataType : 'json',
						success: function(msje) {

							console.log(msje);
							
							swal({   
								type: msje.type,
						        title: msje.title,   
						        text: msje.message,
						        showConfirmButton: true,
						        confirmButtonColor: bcolor
						    }); 

							if(msje.type=="success"){
								//$("#detail-renov-"+idr).hide();
							}
						    
						    

						},
                        error: function (response) {
                        	console.log(response);
                        	alert("error, response: "+response);
                        }
					});
					*/

				}

			});

			jQuery("form.form-send-cv").submit(function(event){

				

			});

		}

		if(jQuery(".redirect_to").length)
		{

			jQuery(".redirect_to").change(function(){

				var u = jQuery(this).val(); 
				window.location.href = u;

			});
		}

		if( jQuery("a.yearlink").length )
		{

			jQuery("a.yearlink").click(function(event){

				event.preventDefault();
				var n = jQuery(this).attr("data-d");
				
				jQuery("a.yearlink").removeClass("active");
				jQuery(this).addClass("active");
				jQuery(".croninfo").addClass("hidden");
				jQuery("#crondesc-"+n).removeClass("hidden");

			});

		}

		if( jQuery("#secondary").length )
		{

			jQuery("#secondary .menu:not(#menu-gobierno-corporativo)").sticky({topSpacing:25});

		}

		

		if( jQuery("#homeslider").length )
		{

			jQuery("#homeslider").slick({
				dots: false,
		        infinite: true,
		        slidesToShow: 1,
		        slidesToScroll: 1,
		        lazyLoad: 'ondemand',
		        fade: true,
		        speed: 1000,
		        autoplay: true,
				autoplaySpeed: 3000
			});

		}

		function validarEmail( email ) {
		    var expr = /^([a-zA-Z0-9_\.\-])+\@(([a-zA-Z0-9\-])+\.)+([a-zA-Z0-9]{2,4})+$/;
		    if ( !expr.test(email) ){ return false; }else{ return true; }
		}

		/*Menu-toggle*/
	    jQuery("#menu-toggle, .sidebar-wrapper-close").on('click',function(event) {
	        event.preventDefault();

	        if(jQuery('.wrapper-click-menu-active').length){
	        	jQuery('.wrapper-click-menu-active').remove();
	        }else{
	        	
	        jQuery('<div class="wrapper-click-menu-active"></div>').on('click', function(){

	        	if( jQuery('body').hasClass('menu-active') && jQuery("#page-content-wrapper").hasClass('menu-main-active') ){
	        		jQuery("#menu-toggle, .sidebar-wrapper-close")[0].click();
	        	}
	        	
	        }).appendTo('#wrapper');
	        }



	        jQuery("#wrapper").toggleClass("active");
	        jQuery("#page-content-wrapper").toggleClass("menu-main-active");
	        jQuery('body').toggleClass('no-scroll');
	        jQuery('body').toggleClass('menu-active');
	        jQuery('.sidebar-menu-left, .sidebar-menu-right').toggleClass('hide');


			jQuery('#page-content-wrapper').on('click', function(){
				
	        	//if( jQuery('body').hasClass('menu-active') && jQuery("#page-content-wrapper").hasClass('menu-main-active') ){
	        	//	jQuery("#menu-toggle, .sidebar-wrapper-close")[0].click();
	        	//}
	        	
	        });

	    });

		
	});

}(jQuery));