jQuery(document).ready(function($){
/*global jQuery:false */
"use strict";

    var $container = $('ul.mansory');
    
    $container.imagesLoaded(function(){
      $container.masonry({
        itemSelector: 'li.post',
        columnWidth:0
      });
    });

	jQuery(document).ready(function () {
		var delay = 100, t = 0;
		jQuery("ul.mansory li").each(function(){
          t += delay;
          var jQueryli = jQuery(this);
          setTimeout(function(){
			jQueryli.animate({opacity:'1'},800);
          },t);
		});
	});
});