!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){function i(){var b,c,d={height:f.innerHeight,width:f.innerWidth};return d.height||(b=e.compatMode,(b||!a.support.boxModel)&&(c="CSS1Compat"===b?g:e.body,d={height:c.clientHeight,width:c.clientWidth})),d}function j(){return{top:f.pageYOffset||g.scrollTop||e.body.scrollTop,left:f.pageXOffset||g.scrollLeft||e.body.scrollLeft}}function k(){if(b.length){var e=0,f=a.map(b,function(a){var b=a.data.selector,c=a.$element;return b?c.find(b):c});for(c=c||i(),d=d||j();e<b.length;e++)if(a.contains(g,f[e][0])){var h=a(f[e]),k={height:h[0].offsetHeight,width:h[0].offsetWidth},l=h.offset(),m=h.data("inview");if(!d||!c)return;l.top+k.height>d.top&&l.top<d.top+c.height&&l.left+k.width>d.left&&l.left<d.left+c.width?m||h.data("inview",!0).trigger("inview",[!0]):m&&h.data("inview",!1).trigger("inview",[!1])}}}var c,d,h,b=[],e=document,f=window,g=e.documentElement;a.event.special.inview={add:function(c){b.push({data:c,$element:a(this),element:this}),!h&&b.length&&(h=setInterval(k,250))},remove:function(a){for(var c=0;c<b.length;c++){var d=b[c];if(d.element===this&&d.data.guid===a.guid){b.splice(c,1);break}}b.length||(clearInterval(h),h=null)}},a(f).on("scroll resize scrollstop",function(){c=d=null}),!g.addEventListener&&g.attachEvent&&g.attachEvent("onfocusin",function(){d=null})});

function inview(){
		$(".list").on('inview',function(event, isInView){
			$.Velocity.hook($(this).find('.article'),'translateY','-10px');
			$.Velocity.hook($(this).find('h2'),'translateY','-10px');
			$.Velocity.hook($(this).find('.post-meta'),'translateY','-10px');
			$(this).find('.post-meta').velocity({translateY:'0', opacity:'1'},{delay:300,duration:700,easing:'easeOutQuad',queue:false});
			$(this).find('h2').velocity({translateY:'0', opacity:'1'},{delay:600,duration:700,easing:'easeOutQuad',queue:false});
			$(this).find('.article').velocity({translateY:'0', opacity:'1'},{delay:700,duration:700,easing:'easeOutQuad',queue:false});
			$(this).off();
			});
}

function bg(){  
$(function(){
    zoom1 = $('.banner').css('padding-bottom')
	zoom2 = parseFloat(zoom1)
	zoom = $('.banner').width()
    size =  zoom + zoom2 * 1.5  ;
	$('.banner').css('background-size' , size );
    $(window).on('scroll', (function() {
      fromTop = $(window).scrollTop();
      newSize = size - (fromTop/3);
      if (newSize > $('.banner').width()) {
          $('.banner').css({
			  'will-change': 'scroll-position',
              'background-size': newSize,
              '-webkit-filter':'blur('+ 0 + (fromTop/100) + 'px)',
              'opacity': 1 - ((fromTop / $('html').height()) * 1.3)
          });
      }
    }));
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
	inview();
})
}  

