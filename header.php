<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<html lang="zh">
<head>
<!-- 输出头部HTML信息 -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
	<link rel="dns-prefetch" href="https://cdn.bootcss.com"/>
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	 <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

<!-- 引入前端资源 -->
	<link href="<?php $this->options->themeUrl('css/bootstrap.min.css'); ?>" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/app.css'); ?>" rel="stylesheet">

<!-- 导航栏 -->
<?php $this->header(); ?>
</head>

<body <?php if ( $this->is('post') ) echo ' data-spy="scroll" data-target="#toc" ' ?> >
<div id="loading" ></div>
<div id="app">

	 <nav id="nav-menu" class="navbar navbar-expand-md navbar-dark fixed-top noselect" role="navigation">
		<div class="container-fluid">
		<a title="" class="navbar-brand offset-xl-1" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" >
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse offset-xl-right-1" id="navbarResponsive">
        <ul id="menu" class="navbar-nav ml-auto ">
            <li class="nav-item active<?php if($this->is('index')): ?> <?php endif; ?>"> <a class="nav-link" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while($category->next()): ?>
                <li class="nav-item active<?php if($this->is('category', $category->slug)): ?> <?php endif; ?>"><a class="nav-link" href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
            <?php endwhile; ?>
        </ul>
		</div>
		</div>
    </nav>


	<?php if ( $this->is('post') || $this->is('page') ) : ?>
		<?php if (array_key_exists('img',unserialize($this->___fields()))): ?>
	<header id="banner" class="shadow-sm" style="background-position: left center ; background-image: url(<?php $this->fields->img(); ?>);">
		<?php else: ?>
		<header id="banner" class="shadow"  style="background-position: left center ; background-image: url(<?php showThumbnail($this); ?>);">
		<?php endif;?>
			<div class="container">
			<div class="row">
			  <div class=" col-md-8 post-header-meta noselect">
				<h1 class="display-3" data-toc-skip><?php $this->title() ?></h1>
				 <div class="header-meta">
				 <span><?php echo $this->author->gravatar(32);?></span>
				 <span><?php $this->author(); ?></span>
				 <span class="lead"> <time data-toggle="tooltip" data-placement="bottom" title="Last Update: <?php echo date('F j, Y', $this->modified);?>"><?php $this->date('F j, Y'); ?></time></span>
				 <span class="lead" id="zishu"><?php echo art_count($this->cid); ?> 字</span>
				  </div>
			</div>
		</div>
		</div>
		</header>
	<?php else: ?>
	<header id="banner" class="shadow-sm" style="background-position: <?php if($this->options->bgpos): $this->options->bgpos(); else: "top center" ; endif; ?> ; background-image: -webkit-linear-gradient(top, rgba(23, 24, 32, 0.15), rgba(23, 24, 32, 0.15)),url(<?php $this->options->backgroundImage(); ?>);"></header>
	<?php endif; ?>


 <div class="main mt-4">
