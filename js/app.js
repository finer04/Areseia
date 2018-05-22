$(function(){
    zoom = $('.banner').css('background-size')
    zoom = parseFloat(zoom)/100
    size = 2000;
    $(window).on('scroll', function(){
      fromTop = $(window).scrollTop();
      newSize = size - (fromTop/3);
      if (newSize > $('.banner').width()) {
          $('.banner').css({
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

$(function (){
    var isChrome = /Chrome/.test(navigator.userAgent) && /Google Inc/.test(navigator.vendor);
    var isSafari = /Safari/.test(navigator.userAgent) && /Apple Computer/.test(navigator.vendor);

    if (isChrome || isSafari ) {
    } else {
        $('.banner').append('<div class="opaque"></div>');
        $(window).on('scroll', function(){
            var opacity = 0 + ($(window).scrollTop()/5000);
            $('.opaque').css('opacity', opacity);
        });
    }
});

$(function (){
new WOW().init();
})

$(document).ready(function(){
		$(".navbar").headroom();
		init();
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
