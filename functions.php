<?php
if (!defined('__TYPECHO_ROOT_DIR__')) exit;

function themeConfig($form) {
    $backgroundImage = new Typecho_Widget_Helper_Form_Element_Text('backgroundImage', NULL, NULL, _t('顶部默认背景图像'), _t('请输入背景图片地址'));
    $form->addInput($backgroundImage);


	$bgpos= new Typecho_Widget_Helper_Form_Element_Text('bgpos', NULL, NULL, _t('定位首页顶部背景图像'), _t('请输入首页顶部背景图的定位，格式要跟 background-position 一样，如果为空就使用主题默认的 "top center"'));
    $form->addInput($bgpos);

    $usesmooth = new Typecho_Widget_Helper_Form_Element_Radio('usesmooth',
        array('0' => _t('不使用'),
            '1' => _t('使用')),
        '1', _t('是否使用平滑滚动（SmoothScroll）？'));
    $form->addInput($usesmooth);

        $tongji = new Typecho_Widget_Helper_Form_Element_Textarea('tongji', NULL, NULL, _t('统计代码'), _t('请输入你的统计代码，或者其他 Javascript 代码'));
        $form->addInput($tongji);

    $icpbeian= new Typecho_Widget_Helper_Form_Element_Text('icpbeian', NULL, NULL, _t('ICP 网站备案许可证号'), _t('输入您的网站备案号'));
        $form->addInput($icpbeian);
        
    $gonganbeian= new Typecho_Widget_Helper_Form_Element_Text('gonganbeian', NULL, NULL, _t('公安备案号'), _t('输入您的网站备案号'));
    $form->addInput($gonganbeian);


}

function themeInit($archive)
{
    if ($archive->is('post') || $archive->is('page')) {
        $archive->content = preg_replace('#<img(.*?) src="(.*?)" (.*?)>#',
        '<img$1 data-original="$2" class="lazy" $3>', $archive->content);
    }
}

function fenleinum($id){
$db = Typecho_Db::get();
$po=$db->select('table.metas.count')->from ('table.metas')->where ('parent = ?', $id)->orWhere('mid = ? ', $id);
$pom = $db->fetchAll($po);
$num = count($pom);
$shu = 0;
for ($x=0; $x<$num; $x++) {
$shu=$pom[$x]['count']+$shu;
}
echo $shu;
}

function art_count($cid){
$db=Typecho_Db::get ();
$rs=$db->fetchRow ($db->select ('table.contents.text')->from ('table.contents')->where ('table.contents.cid=?',$cid)->order ('table.contents.cid',Typecho_Db::SORT_ASC)->limit (1));
echo mb_strlen($rs['text'], 'UTF-8');
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
