$(document).ready(function() 
{	
	if( /iPad/i.test(navigator.userAgent) ) {
		$('meta[name="viewport"]').attr('content','width=980px, maximum-scale=1');
	}	
	
	 isIE11 = !!window.MSStream;
 	  if(isIE11){
		$('body').addClass('ie10');
	  } 
	
	else 
	{
	}
	
	$('.nav-sticky').hide();
	var uagent = navigator.userAgent.toLowerCase();
       if (uagent.search("iphone") > -1)
       {
		   $('.carousel').carousel({
			interval: false
			})
       	}
       if (uagent.search("android") > -1)
       {
		   $('.carousel').carousel({
			interval: false
			})
       	}
       	else
       	{
      $('.carousel').carousel({
    interval: false
    }) 
	
	$(window).scroll(function(){
			if ($(this).scrollTop() > 100) {
				$('.scrollup').fadeIn();
			} else {
				$('.scrollup').fadeOut();
			}
	});
	
	$(window).scroll(function(){
			if ($(this).scrollTop() > 480) {
				$('.nav-sticky').fadeIn();
			} else {
				$('.nav-sticky').fadeOut();
			}
	});
	
	$('.scrollup').click(function(){
		$("html, body").animate({ scrollTop: 0 }, 600);
		return false;
	 });
	 }
	 
	 
	 $('body.blog .main-content-div img').addClass("pull-left thumbnail blog-img");
	  $('body.single-media_coverage .main-content-div img').addClass("pull-left thumbnail blog-img");
	  $('body.single-post .main-content-div img').addClass("pull-left thumbnail blog-img");
	 
	 $('.main-content-div img.pdf-img').removeClass("pull-left thumbnail blog-img");
	 
	 $('a[title^= "Go to Patient Care."]').removeAttr("href");

});
