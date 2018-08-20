<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="container-fluid" id="post">
	<div class="row">
		<div class="col-md-2 col-xl-2 mt-3 offset-lg-1">
			<nav id="toc"  class="tocs text-right d-none d-sm-block sticky-top" data-toggle="toc" ><p class="lead">文章目录：</p></nav>
			<div class="scrolltop d-none d-sm-block sticky-top text-center">
				<button type="button" class="btn btn-outline-dark" id="scroll-top"><span>▲ Top</span> </button>
			</div>
		</div>

	<div class="col-md-10 col-xl-8 col-12">
    <section>
		<div class="post-content mx-2" temprop="articleBody">
            <?php $this->content(); ?>
        </div>
	<div class="col-sm-10 post-tag">
		<?php $this->tags('', true, ''); ?>
		</div>
	<?php $this->need('comments.php'); ?>
	</section>
	</div>
</div>
	</div>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="lightbox" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog img-box" style="max-width:65rem;">
	    <div class="modal-content">

	    </div>
	  </div>
	</div>

<?php $this->need('footer.php'); ?>
