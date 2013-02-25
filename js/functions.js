/* Create a closure to maintain scope of the '$' and remain compatible with other frameworks.  */

(function ($) {

    /* @group same as $(document).ready(); event fires when the DOM is ready */
    $(function () {    

      // Carousel

			$('#slides').slides({
				preload: true,
				preloadImage: 'img/loading.gif',
				play: 5000,
				pause: 2500,
				hoverPause: true
      });

       
       
       //Persistent Header
    function UpdateTableHeaders() {
       $(".persist-area").each(function() {
       
           var el             = $(this),
               offset         = el.offset(),
               scrollTop      = $(window).scrollTop(),
               floatingHeader = $(".floatingHeader", this)
           
           if ((scrollTop > offset.top)) {
               floatingHeader.css({
                "visibility": "visible"
               });
           } else {
               floatingHeader.css({
                "visibility": "hidden"
               });      
           };
       });
    }
    
    // DOM Ready      
    $(function() {
    
       var clonedHeaderRow;
    
       $(".persist-area").each(function() {
           clonedHeaderRow = $(".persist-header", this);
           clonedHeaderRow
             .before(clonedHeaderRow.clone())
             .css("width", clonedHeaderRow.width())
             .addClass("floatingHeader");
             
       });
       
      $(window)
        .scroll(UpdateTableHeaders)
        .trigger("scroll");
       
    });
    //Persistent eader end
        
	

  



    });
    /* @end $(document).ready(); */


    /* @group bind window load. events doesn't fire until the document is fully loaded (images and all) */
    $(window).bind("load", function () {

    });
    /* @end: bind window load */

})(jQuery);

/* =End closure */