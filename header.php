<?php if (!defined('__TYPECHO_ROOT_DIR__')) exit; ?>
<!DOCTYPE HTML>
<head>
<!-- 输出头部HTML信息 -->
	<meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge, chrome=1">
    <meta name="renderer" content="webkit">
    <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no">
	 <title><?php $this->archiveTitle(array(
            'category'  =>  _t('分类 %s 下的文章'),
            'search'    =>  _t('包含关键字 %s 的文章'),
            'tag'       =>  _t('标签 %s 下的文章'),
            'author'    =>  _t('%s 发布的文章')
        ), '', ' - '); ?><?php $this->options->title(); ?></title>

<!-- 引入前端资源 -->
	<link href="https://cdn.bootcss.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet">
	<link href="<?php $this->options->themeUrl('css/app.css'); ?>" rel="stylesheet">
	<link href="https://cdn.bootcss.com/animate.css/3.5.2/animate.min.css" rel="stylesheet">
	
<!-- 导航栏 -->
<?php $this->header(); ?>
</head>

<body <?php if ( $this->is('post') ) echo ' class="single"' ?> >
<div id="page">

	 <nav id="nav-menu" class="navbar navbar-expand-lg navbar-dark fixed-top" role="navigation" style="background: rgba(0, 0, 0, 0);">
		<div class="container">
		<a title="" class="navbar-brand" href="<?php $this->options->siteUrl(); ?>"><?php $this->options->title() ?></a>
		<button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarTogglerDemo02" aria-expanded="false" aria-label="Toggle navigation">
			<span class="navbar-toggler-icon"></span>
		</button>
		<div class="collapse navbar-collapse" id="navbarResponsive">
        <ul id="menu-%e8%8f%9c%e5%8d%951" class="navbar-nav ml-auto">
            <li class="nav-item active<?php if($this->is('index')): ?> <?php endif; ?>"> <a class="nav-link" href="<?php $this->options->siteUrl(); ?>"><?php _e('首页'); ?></a></li>
            <?php $this->widget('Widget_Metas_Category_List')->to($category); ?>
            <?php while($category->next()): ?>
                <li class="nav-item active<?php if($this->is('category', $category->slug)): ?> <?php endif; ?>"><a class="nav-link" href="<?php $category->permalink(); ?>" title="<?php $category->name(); ?>"><?php $category->name(); ?></a></li>
            <?php endwhile; ?>
        </ul>
		</div>	
		</div>
    </nav>
<header class="banner animated fadeIn brightness" style="filter: blur(0px) ;opacity: 1;">
	
	<?php if ( $this->is('post') || $this->is('page') ) : ?>    

<div class="container">
	<div class="row">
      <div class=" col-md-10 post-header-meta">
        <h1 class="display-3"><?php $this->title() ?></h1>
         <div class="header-meta">
		 <span><?php echo $this->author->gravatar(32);?></span>
		 <span><?php $this->author(); ?></span>
		 <span class="lead"> <time><?php $this->date('F j, Y'); ?></time></span>
          </div>
    </div>
</div>
</div>
<?php endif;?>
</header>
		

 <div class="main">
	


