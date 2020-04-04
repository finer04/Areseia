<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<div class="container" id="page">
	<div class="row">

<section class="col-md-12 col-12">
		<div class="post-content mx-2" temprop="articleBody">
            <?php $this->content(); ?>
        </div>
	<div class="col-sm-10 post-tag">
		<?php $this->tags('', true, ''); ?>
		</div>
	<?php /* $this->need('comments.php'); */ ?>
	</section>
	</div>
	</div>

	<div class="scrolltop d-none d-sm-block text-center">
		<button type="button" class="btn btn-outline-dark" id="scroll-top"><span>▲ Top</span> </button>
	</div>

	<div class="modal fade bd-example-modal-lg" tabindex="-1" role="dialog" id="lightbox" aria-labelledby="myLargeModalLabel" aria-hidden="true">
	  <div class="modal-dialog img-box" style="max-width:65rem;">
	    <div class="modal-content">

	    </div>
	  </div>
	</div>

<?php $this->need('footer.php'); ?>
