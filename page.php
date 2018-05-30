<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>
<section class="container">
	<div class="row">
		<div class="col-md-2">
			<nav id="toc"  class="sticky-top tocs"><p class="lead">文章目录：</p></nav>
		</div>

	<div class="col-md-10">
    <section class="container">
		<div class="post-content" temprop="articleBody">
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
<?php $this->need('footer.php'); ?>