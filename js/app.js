function bg(){  
$(function(){
    zoom1 = $('.banner').css('background-size')
    zoom = parseFloat(zoom1)*5
    size =  zoom + $('.banner').width() ;
	$('.banner').css('background-size' , size );
    $(window).on('scroll', function(){
      fromTop = $(window).scrollTop();
      newSize = size - (fromTop/3);
      if (newSize > $('.banner').width()) {
          $('.banner').css({
			  'will-change': 'scroll-position',
              '-webkit-background-size': newSize,
              '-moz-background-size': newSize,
              '-o-background-size': newSize,
              'background-size': newSize,
              '-webkit-filter':'blur('+ 0 + (fromTop/100) + 'px)',
              'opacity': 1 - ((fromTop / $('html').height()) * 1.3)
          });
      }
    });
});
}  


$(function (){
new WOW().init();
})

$(document).ready(function(){
		bg();
		init();
		$(".navbar").headroom();
});

function init(){  
$(function (){
	$( ".pagination a").wrap( "<li class='page-item'></li>" );
	$( ".pagination a").addClass( "page-link" );
	$( "img").addClass( "img-fluid");
	$( "table").wrap( "<div class='table-responsive'></div>" );
	$("table").addClass("table table-hover");
	$("thead").addClass("thead-light");
	$(".comment-list").addClass("list-group list-group-flush");
	$("#comments p").addClass("mb-1");
	$(".navbar").headroom();
	$(".post-tag a").addClass("border border-primary rounded");
})
}  

