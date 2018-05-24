<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div>
<footer class="bd-footer text-muted">
	<div class="container-fluid p-3 p-md-5">
		<p>	&copy; <?php echo date("Y")?>  <?php $this->options->title() ?></a> / Areseia by Finer04  /
		<a class="text-muted" href="http://typecho.org/">Powered by Typecho</a></p>
	</div>
</footer>
</div>
<?php $this->footer(); ?>

<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js"></script>
<script src="https://cdn.bootcss.com/jquery.pjax/2.0.1/jquery.pjax.min.js"></script>
<script src="https://cdn.bootcss.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="https://cdn.bootcss.com/wow/1.1.2/wow.js"></script>
<script async src="https://cdn.bootcss.com/headroom/0.9.4/!!jQuery.headroom.min.js,headroom.min.js"></script>
<script src="https://cdn.bootcss.com/smoothscroll/1.4.6/SmoothScroll.min.js"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>

<script>
$(document).pjax('a[href^="<?php Helper::options()->siteUrl()?>"]:not(a[target="_blank"], a[no-pjax])', {
    container: '#page',
    fragment: '#page',
    timeout: 8000
}).on('pjax:send',
function() {
	$( "#loading").fadeIn(300);
}).on('pjax:complete',
function() {
	$( "#loading").fadeOut(600);
	bg();
	init();
});
</script>



<div id="loading" ></div>

</body>
</html>