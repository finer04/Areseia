<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $backgroundImage = new Typecho_Widget_Helper_Form_Element_Text('backgroundImage', NULL, NULL, _t('顶部默认背景图像'), _t('请输入背景图片地址'));
    $form->addInput($backgroundImage);
}

function showThumbnail($widget) {
$options = Typecho_Widget::widget('Widget_Options');
$attach = $widget->attachments(1)->attachment;
$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
$random = $options->backgroundImage;
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
echo $thumbUrl[1][0];
} else
if ($attach && $attach->isImage) {
echo $attach->url;
} else {
echo $random ;
} }

