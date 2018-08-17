//jquery.inview 核心代码
! function(a) {
  "function" == typeof define && define.amd ? define(["jquery"], a) : "object" == typeof exports ? module.exports = a(require("jquery")) : a(jQuery)
}(function(a) {
  function i() {
    var b, c, d = {
      height: f.innerHeight,
      width: f.innerWidth
    };
    return d.height || (b = e.compatMode, (b || !a.support.boxModel) && (c = "CSS1Compat" === b ? g : e.body, d = {
      height: c.clientHeight,
      width: c.clientWidth
    })), d
  }

  function j() {
    return {
      top: f.pageYOffset || g.scrollTop || e.body.scrollTop,
      left: f.pageXOffset || g.scrollLeft || e.body.scrollLeft
    }
  }

  function k() {
    if (b.length) {
      var e = 0,
        f = a.map(b, function(a) {
          var b = a.data.selector,
            c = a.$element;
          return b ? c.find(b) : c
        });
      for (c = c || i(), d = d || j(); e < b.length; e++)
        if (a.contains(g, f[e][0])) {
          var h = a(f[e]),
            k = {
              height: h[0].offsetHeight,
              width: h[0].offsetWidth
            },
            l = h.offset(),
            m = h.data("inview");
          if (!d || !c) return;
          l.top + k.height > d.top && l.top < d.top + c.height && l.left + k.width > d.left && l.left < d.left + c.width ? m || h.data("inview", !0).trigger("inview", [!0]) : m && h.data("inview", !1).trigger("inview", [!1])
        }
    }
  }
  var c, d, h, b = [],
    e = document,
    f = window,
    g = e.documentElement;
  a.event.special.inview = {
    add: function(c) {
      b.push({
        data: c,
        $element: a(this),
        element: this
      }), !h && b.length && (h = setInterval(k, 250))
    },
    remove: function(a) {
      for (var c = 0; c < b.length; c++) {
        var d = b[c];
        if (d.element === this && d.data.guid === a.guid) {
          b.splice(c, 1);
          break
        }
      }
      b.length || (clearInterval(h), h = null)
    }
  }, a(f).on("scroll resize scrollstop", function() {
    c = d = null
  }), !g.addEventListener && g.attachEvent && g.attachEvent("onfocusin", function() {
    d = null
  })
});



//velocity+inview控制动画
function inview() {
  $(".ani").one('inview', function(event, isInView) {
    $.Velocity.hook($(this).find('.article'), 'translateY', '-10px');
    $.Velocity.hook($(this).find('h2'), 'translateY', '-10px');
    $.Velocity.hook($(this).find('.post-meta'), 'translateY', '-10px');
    $(this).find('.post-meta').velocity({
      translateY: '0',
      opacity: '1'
    }, {
      delay: 300,
      duration: 600,
      easing: 'easeOutQuad',
      queue: false
    }).removeClass('ani');
    $(this).find('h2').velocity({
      translateY: '0',
      opacity: '1'
    }, {
      delay: 400,
      duration: 500,
      easing: 'easeOutSine',
      queue: false
    }).removeClass('ani');
    $(this).find('.article').velocity({
      translateY: '0',
      opacity: '1'
    }, {
      delay: 500,
      duration: 550,
      easing: 'easeOutSine',
      queue: false
    }).removeClass('ani');
    $(this).off();
  });
}

//背景图滚动虚化
function bg() {
  var $b = $('#banner');
  zoom1 = $b.css('padding-bottom');
  zoom = $b.width();
  zoom2 = parseFloat(zoom1);
  size = zoom + zoom2 * 1.1;
  $b.css('background-size', size);
  $(window).on('scroll', function() {
    fromTop = $(window).scrollTop();
    newSize = size - (fromTop / 3);
    if (fromTop < 600) {
      if (zoom2 > fromTop) {
        $b.css({
          'background-size': newSize,
          'opacity': 1 - ((fromTop / zoom2))
        });
      }
    } else {}
  });
  $(window).resize(function() {
    bg();
  });
}

//inview + lazyload
function lazyload() {
  $("img[data-original]").one('inview', function(event, isInView) {
    var $this = $(this);
    $this.attr("src", $this.attr("data-original")).velocity("fadeIn", {
      duration: 500
    });
    $this.removeAttr("data-original");
  });
}

  //检查文章页是否有h1/h2标签，如果没有则不调用文章目录
function ifnotoc() {
  h1 = $('.post-content').find("h1").length;
  h2 = $('.post-content').find("h2").length;
  if (h1 == 0 && h2 == 0) {
    $('#post').find('.col-md-2').remove();
    $('#post').find('.col-md-10').attr('class', 'col-md-12');
  }
}

//平滑到首页顶部
$('#scroll-top').click(function() {
  $('html,body').animate({
    scrollTop: '0px'
  }, 800);
});

//model版lightbox
$('.post-content img').click(function() {
  img = $(this).attr("src");
  $('<img>', {
    src: img,
    class: 'img-fluld',
    onclick: "$('#lightbox').modal('hide');",
  }).appendTo(".modal-content");
  $('#lightbox').modal();
})

$('#lightbox').on('hidden.bs.modal', function(e) {
  $('.modal-content').empty();
})

//初始化
function init() {
  //解决 typecho 的页码适应bootstrap问题
  var pageination = $(".pagination a");
  pageination.wrap("<li class='page-item'></li>");
  pageination.addClass("page-link");
  //给文章图片和输入框加入响应式和tooltip
  $("img").addClass("img-fluid").attr({
    "data-toggle": "tooltip",
    "data-placement": "bottom"
  });
  $("input[title]").attr({
    "data-toggle": "tooltip",
    "data-placement": "right"
  });
  $('[data-toggle="tooltip"]').tooltip();
  //解决 typecho 给文章图片加<p>元素导致排版问题，并修复图片下一行的文字的排版问题
  $(".post-content img").addClass('img-thumbnail shadow-sm').unwrap();
  $('.post-content').contents().filter(function() {
    return this.nodeType == Node.TEXT_NODE;
  }).wrap('<p></p>');
  //解决 typecho 的表格样式问题
  $("table").wrap("<div class='table-responsive'></div>");
  $("table").addClass("table table-hover");
  $("thead").addClass("thead-light");
  //适应评论区的样式表
  $(".comment-list").addClass("list-group list-group-flush");
  $("#comments p").addClass("mb-1");
  //给导航栏调用headroom
  $(".navbar").headroom();
  //自定义标签样式
  $(".post-tag a").addClass("border border-primary rounded");
  bg();
  inview();
  lazyload();
  ifnotoc();
  $("#loading").fadeOut(600);
}
