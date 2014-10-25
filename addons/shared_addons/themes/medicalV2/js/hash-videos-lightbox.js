jQuery(document).ready(function($) {
	//WP Video Lightbox Pluign - http://www.tipsandtricks-hq.com/?p=2700

 if(window.location.hash) {
         var hash = window.location.hash; //Puts hash in variable
   

$('a[href^= "' + hash + '"]').trigger('click');


    }	  
  
});
