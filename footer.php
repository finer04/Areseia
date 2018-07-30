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


<script src="https://cdn.bootcss.com/jquery/3.2.1/jquery.min.js" data-no-instant></script>
<script src="<?php $this->options->themeUrl('js/optimized.js'); ?>" ></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>
<script data-no-instant>
InstantClick.on('change', function() {
  init();
  $('#toc').find("ul").remove();
});
InstantClick.init('mousedown');
</script>

</body>
</html>