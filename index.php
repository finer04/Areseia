<?php
/**
 * @package Areseia
 * @author Finer04
 * @version 1.0.0
 * @link https://fil.fi/
 */

if (!defined('__TYPECHO_ROOT_DIR__')) exit;
$this->need('header.php');
?>

	<div class="col-xs-8 col-md-10 col-center-block">
    <section class="container">
        <?php while($this->next()): ?>
            <article class="list wow fadeIn" itemscope itemtype="http://schema.org/BlogPosting" data-wow-duration="1s" data-wow-delay="0.3s">
				<div class="row">
					<div class="col-sm-12 col-xs-8 post-meta">
					 <div class="post-left text-left">
					 <?php echo $this->author->gravatar(37);?>
					<span><?php $this->author(); ?></small></span>
					<span class="in"> in </span>
					<span><?php $this->category(','); ?></span></div>
					 <span class="text-right date"><p><?php $this->date('F j, Y'); ?> </p><span>
					 </div>
					</div>
					<div class="row">
						<div class="col-sm-12">
					<h2 itemprop="headline"><a href="<?php $this->permalink() ?>"><?php $this->title() ?></a></h2> 
					</div></div>	
						<div class="row">
                <div class="col-md-12 article" itemprop="articleBody">
                     <?php 
            if(preg_match('/<!--more-->/',$this->content)||mb_strlen($this->content, 'utf-8') < 270)
            {
                $this->content('阅读全文...');
            }
            else
            {    
                    $c=mb_substr($this->content, 0, 240, 'utf-8');
                    $c=preg_replace("/<[img|IMG].*?src=[\'\"](.*?(?:[\.gif|\.jpg|\.jpeg|\.png|\.tiff|\.bmp]))[\'|\"].*?[\/]?>/","",$c);
                    if(preg_match('/<pre>/',$c))
                    {
                       echo $c,'</code></pre>','...';;
                    }
					else if(preg_match('/<blockquote>/',$c))
					{
						echo $c,'</blockquote>','...';;
					}
                    else
                    {
                       echo $c.'...';
                    }
                    echo '</br><p class="more"><u><a href="',$this->permalink(),'" title="',$this->title(),'">阅读全文...</a></u></p>';
            }
        ?>
                </div></div>
				<div class="row">
                </div>				
            </article>
        <?php endwhile; ?>
		
		<nav aria-label="Page">
			<?php $this->pageNav('|<', '>|',3,'',array('wrapTag' => 'ul', 'wrapClass' => 'pagination pagination-lg justify-content-center','itemTag' => '','currentClass' => 'active',)); ?>
		</nav>
		
    </section>
	</div>


<?php $this->need('footer.php'); ?>

