<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php $this->need('header.php'); ?>

	<div class="col-xs-8 col-md-10 col-center-block">
    <section class="container">
		<div class="post-content wow fadeIn" data-wow-delay="0.7s" itemprop="articleBody">
            <?php $this->content(); ?>
        </div>
	
	
	<?php $this->need('comments.php'); ?>
	</section>
	</div>
	
<?php $this->need('footer.php'); ?>