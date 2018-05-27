<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $backgroundImage = new Typecho_Widget_Helper_Form_Element_Text('backgroundImage', NULL, NULL, _t('顶部默认背景图像'), _t('请输入背景图片地址'));
    $form->addInput($backgroundImage);
	
	$bgpos= new Typecho_Widget_Helper_Form_Element_Text('bgpos', NULL, NULL, _t('定位首页顶部背景图像'), _t('请输入首页顶部背景图的定位，格式要跟 background-position 一样，如果为空就使用主题默认的 "top center"'));
    $form->addInput($bgpos);
}

function themeInit($archive)
{ 
    if ($archive->is('post') || $archive->is('page')) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
        '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
}


function showThumbnail($widget) {
$options = Typecho_Widget::widget('Widget_Options');
$attach = $widget->attachments(1)->attachment;
$pattern = '/\<img.*?data-original\=\"(.*?)\"[^>]*>/i';
$random = $options->backgroundImage;
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
echo $thumbUrl[1][0];
} else
if ($attach && $attach->isImage) {
echo $attach->url;
} else {
echo $random ;
} }

