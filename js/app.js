//jquery.inview 核心代码
!function(a){"function"==typeof define&&define.amd?define(["jquery"],a):"object"==typeof exports?module.exports=a(require("jquery")):a(jQuery)}(function(a){function i(){var b,c,d={height:f.innerHeight,width:f.innerWidth};return d.height||(b=e.compatMode,(b||!a.support.boxModel)&&(c="CSS1Compat"===b?g:e.body,d={height:c.clientHeight,width:c.clientWidth})),d}function j(){return{top:f.pageYOffset||g.scrollTop||e.body.scrollTop,left:f.pageXOffset||g.scrollLeft||e.body.scrollLeft}}function k(){if(b.length){var e=0,f=a.map(b,function(a){var b=a.data.selector,c=a.$element;return b?c.find(b):c});for(c=c||i(),d=d||j();e<b.length;e++)if(a.contains(g,f[e][0])){var h=a(f[e]),k={height:h[0].offsetHeight,width:h[0].offsetWidth},l=h.offset(),m=h.data("inview");if(!d||!c)return;l.top+k.height>d.top&&l.top<d.top+c.height&&l.left+k.width>d.left&&l.left<d.left+c.width?m||h.data("inview",!0).trigger("inview",[!0]):m&&h.data("inview",!1).trigger("inview",[!1])}}}var c,d,h,b=[],e=document,f=window,g=e.documentElement;a.event.special.inview={add:function(c){b.push({data:c,$element:a(this),element:this}),!h&&b.length&&(h=setInterval(k,250))},remove:function(a){for(var c=0;c<b.length;c++){var d=b[c];if(d.element===this&&d.data.guid===a.guid){b.splice(c,1);break}}b.length||(clearInterval(h),h=null)}},a(f).on("scroll resize scrollstop",function(){c=d=null}),!g.addEventListener&&g.attachEvent&&g.attachEvent("onfocusin",function(){d=null})});


//velocity+inview控制动画
function inview(){
		$(".ani").on('inview',function(event, isInView){
			$.Velocity.hook($(this).find('.article'),'translateY','-10px');
			$.Velocity.hook($(this).find('h2'),'translateY','-10px');
			$.Velocity.hook($(this).find('.post-meta'),'translateY','-10px');
			$(this).find('.post-meta').velocity({translateY:'0', opacity:'1'},{delay:300,duration:600,easing:'easeOutQuad',queue:false}).removeClass('ani');
			$(this).find('h2').velocity({translateY:'0', opacity:'1'},{delay:400,duration:600,easing:'easeOutQuad',queue:false}).removeClass('ani');
			$(this).find('.article').velocity({translateY:'0', opacity:'1'},{delay:500,duration:600,easing:'easeOutQuad',queue:false}).removeClass('ani');
			$(this).off();
			});
}

//背景图滚动虚化
function bg(){  
	var $b = $('#banner');
    zoom1 = $b.css('padding-bottom');
	zoom = $b.width();
	zoom2 = parseFloat(zoom1);
    size =  zoom + zoom2 * 1.1  ;
	$b.css('background-size' , size );
    $(window).on('scroll', function() {
      fromTop = $(window).scrollTop();
      newSize = size - (fromTop/3);
      if (zoom2 > fromTop) {
          $b.css({
              'background-size': newSize,
              'opacity': 1 - ((fromTop / zoom2) )
          });}
    });
	$(window).resize(function() {
		bg();
	});
}  

//lazyload
function lazyload(){  
$("img[data-original]").one('inview', function(event, isInView) {
	var $this = $(this);
	$this.attr("src", $this.attr("data-original")).velocity("fadeIn",{duration:500});
	$this.removeAttr("data-original");
});
}

function ifnotoc(){
	h = $('.post-content').find("h2").length;
	if(h == 0){
		$('#post').find('.col-md-2').remove();
		$('#post').find('.col-md-10').attr('class','col-md-12');
	}
}

//无限滚动
function scrollload(){
	var ias = jQuery.ias({
	container:  '.main',    
	item:       'article',    
	pagination: '.pagination',    
	next:       '.next'    
	});
	 ias.extension(new IASTriggerExtension({
			text: '加载更多', 
			offset: 2, 
			html: '<div class="col-md-12 d-flex justify-content-center"><div class="ias-trigger ias-trigger-next btn btn-outline-secondary text-center"><a>{text}</a></div></div>'
		}));
	ias.extension(new IASSpinnerExtension({
			html: '<div class="col-md-12 d-flex justify-content-center"><div class="ias-spinner text-center font-weight-light"><a>不要停下来啊...(指加载)</a></div></div>'
	}));
	ias.extension(new IASNoneLeftExtension({
		text: "已经没有文章了",
		html: '<div class="col-md-12 d-flex justify-content-center"><div class="ias-noneleft text-center font-weight-light"><a>{text}</a></div></div>',
		}));    
	 ias.on('rendered', function(items) {
		 inview();
	 })
}

//初始化
function init(){  
	$( ".pagination a").wrap( "<li class='page-item'></li>" );
	$( ".pagination a").addClass( "page-link" );
	$( "img").addClass( "img-fluid").attr({"data-toggle":"tooltip","data-placement":"bottom"});
	$("input[title]").attr({"data-toggle":"tooltip","data-placement":"right"});
	$( "table").wrap( "<div class='table-responsive'></div>" );
	$("table").addClass("table table-hover");
	$("thead").addClass("thead-light");
	$(".comment-list").addClass("list-group list-group-flush");
	$("#comments p").addClass("mb-1");
	$(".navbar").headroom();
	$('[data-toggle="tooltip"]').tooltip();
	$(".post-tag a").addClass("border border-primary rounded");
	bg();
	inview();
	lazyload();
	scrollload();
	ifnotoc();
	$("#loading").fadeOut(600);
}  

