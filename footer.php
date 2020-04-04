<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>

</div>
<footer class="bd-footer text-muted">
	<div class="container-fluid p-3 p-md-5">
<span class="float-left mr-2 copyright ">&copy; </span>
		<p class="col-md-4 col-lg-8">	<?php echo date("Y")?>  <?php $this->options->title() ?></a> / Areseia by Finer04  /
		<a class="text-muted" href="http://typecho.org/">Powered by Typecho</a>  
</p>
<p class="col-md-4 col-lg-8 my-1">

<?php if($this->options->icpbeian){ ?>
    <a class="text-muted" href="http://beian.miit.gov.cn" target="_blank" rel="nofollow noopener noreferrer"> <?php $this->options->icpbeian(); ?> /</a>
    <a target="_blank" id="gongan" href="http://www.beian.gov.cn/portal/registerSystemInfo?recordcode=44060602001433" class="text-muted"><?php $this->options->gonganbeian(); ?></a>
<?php }  ?>  

</p>

	</div>
</footer>
</div>
<?php $this->footer(); ?>


<script src="<?php $this->options->themeUrl('js/jquery.min.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/optimized.js'); ?>"></script>
<script src="<?php $this->options->themeUrl('js/app.js'); ?>"></script>

<?php if($this->options->usesmooth){ ?>
   <script src="https://cdn.staticfile.org/smooth-scroll/14.2.1/smooth-scroll.min.js"></script>
<?php }  ?>

<script data-no-instant>
InstantClick.on('change', function() {
  init();
  $('#toc').find("ul").remove();
  $("body").scrollspy()
});
InstantClick.init('mousedown');
</script>

<?php if($this->options->tongji){ ?>
   <?php $this->options->tongji(); ?>
<?php }  ?>


</body>
</html>
