<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<?php function threadedComments($comments, $options) {
    $cl = $comments->levels > 0 ? 'comment-children' : 'list-group-item';
    $author = $comments->url ? '<a href="' . $comments->url . '"'.'" target="_blank"' . ' rel="external">' . $comments->author . '</a>' : $comments->author;
?>
<li id="li-<?php $comments->theId();?>" class="<?php echo $cl;?> list-group-item-action flex-column align-items-start">
<div id="<?php $comments->theId(); ?>" class="d-flex w-100 justify-content-between">
	
<?php $a = 'https://cdn.v2ex.com/gravatar/' . md5(strtolower($comments->mail)) . '?s=80&r=X&d=mm';?>
    <h5 class="mb-1"><img class="avatar" src="<?php echo $a ?>" alt="<?php echo $comments->author; ?>" />
	<?php echo $author ?></h5>
	<small><?php $comments->reply(); ?></small>
</div>
   <?php $comments->content(); ?>
   <small> <?php $comments->date(); ?></small> 
    
	
<?php if ($comments->children){ ?><div class="children"><?php $comments->threadedComments($options); ?></div><?php } ?>

</li>
<?php } ?>

<div id="comments" class="list-group responsesWrapper wow fadeIn" data-wow-delay="0.5s">
	<?php $this->comments()->to($comments); ?>
	<?php if ($comments->have()): ?>
    <h4><?php $this->commentsNum(_t('暂无评论'), _t('仅有 1 条评论'), _t('已有 %d 条评论')); ?></h4>
    <?php $comments->listComments(); ?><?php $comments->pageNav('&laquo;', '&raquo;'); ?>
<?php endif; ?>

<?php if($this->allow('comment')): ?>

    <h4 id="response">Leave a Reply</h4>
<form method="post" action="<?php $this->commentUrl() ?>" id="comment-form" class="comment-form" role="form">
<div class="container">
            <?php if($this->user->hasLogin()): ?>
    		<p><?php _e('登录身份: '); ?><a href="<?php $this->options->profileUrl(); ?>"><?php $this->user->screenName(); ?></a>. <a href="<?php $this->options->logoutUrl(); ?>" title="Logout"><?php _e('退出'); ?> &raquo;</a></p>
            <?php else: ?>
			<div class="col-xs-4">
    		<p class="comment-form-author">
            <label for="author"><?php _e('称呼'); ?> <span class="required">*</span></label>
    			<input type="text" name="author" id="author" class="form-control" placeholder="Enter your name" value="<?php $this->remember('author'); ?>" required />
			</p>
			</div>
			<div class="col-xs-5">
    		<p class="comment-form-email">
                <label for="mail"><?php _e('Email'); ?> <span class="required">*</span></label>
    			<input type="email" name="mail" id="mail" class="form-control" placeholder="Enter email" value="<?php $this->remember('mail'); ?>"<?php if ($this->options->commentsRequireMail): ?> required<?php endif; ?> />
    		</p>
			</div>
			<div class="col-xs-5">
    		<p class="comment-form-url">
                <label for="url"<?php if ($this->options->commentsRequireURL): ?> class="required"<?php endif; ?>><?php _e('网站'); ?></label>
    			<input type="url" name="url" id="url" class="form-control" placeholder="<?php _e('http://'); ?>" value="<?php $this->remember('url'); ?>"<?php if ($this->options->commentsRequireURL): ?> required<?php endif; ?> />
    		</p>
			</div>
            <?php endif; ?>
			<div class="col-xs-12" style="margin:10px 0;">
                <label for="textarea"><?php _e(''); ?></label>
                <textarea rows="8" name="text" id="textarea" class="form-control" placeholder="Write something..." required ><?php $this->remember('text'); ?></textarea>
            </p>
			 </div>
    		
                <button type="submit" class="submit btn btn-primary btn-lg btn-block"><?php _e('提交评论'); ?></button>
            </div>
    	</form>
    </div>
</div>
    <?php else: ?>
    <h3><?php _e('评论已关闭'); ?></h3>
    <?php endif; ?>
</div>