<?php
/**
 * @package Areseia
 * @author Finer04
 * @version 1.2.9
 * @link https://fil.fi/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>
	<div class="col-xl-10 col-md-10 col-center-block">
    <section class="container-fluid">
        <?php while($this->next()): ?>
            <article class="list ani" itemscope itemtype="http://schema.org/BlogPosting">
				<div class="row">
					<div class="post-meta col-sm-12 col-lg-12 justify-content-between ani align-items-center">
					 <div class="post-left col-md-6 d-flex align-items-center">
					 <?php echo $this->author->gravatar(37);?>
					<span><?php $this->author(); ?></small></span>
					<span class="in"> in </span>
					<span><?php $this->category(','); ?></span>
					</div>
					 <span class="col-md-auto date d-none d-sm-block mt-1"><?php $this->date('F j, Y'); ?></span>
					 </div>
					</div>
					<div class="row">
						<div class="col-sm-12">
					<h2 class="ani" itemprop="headline"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2>
					<span class="ani d-block d-sm-none mobile-date"><?php $this->date('F j, Y'); ?></span>
					</div></div>
						<div class="row">
                <div class="col-md-12 article ani" itemprop="articleBody">
                     <?php
            if(preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 270)
            {
                $this->content('阅读全文...');
            }
            else
            {
                    $this->excerpt(280, '.....'); 
                    echo '<p class="more"><a href="',$this->permalink(),'" title="',$this->title(),'">阅读全文...</a></p>';
            }
        ?>
                </div></div>
				<div class="row">
                </div>
            </article>
        <?php endwhile; ?>

		<nav aria-label="Page">
			<?php $this->pageNav('上一页', '下一页',1,'...',array('wrapTag' => 'ul', 'wrapClass' => 'pagination justify-content-center','itemTag' => '','currentClass' => 'activenumber',)); ?>
		</nav>

    </section>
	</div>


<?php $this->need('footer.php'); ?>
