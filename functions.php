<?php

function showThumbnail($widget) {
$attach = $widget->attachments(1)->attachment;
$pattern = '/\<img.*?src\=\"(.*?)\"[^>]*>/i';
$random = '/img/cover.jpg';
if (preg_match_all($pattern, $widget->content, $thumbUrl)) {
echo $thumbUrl[1][0];
} else
if ($attach && $attach->isImage) {
echo $attach->url;
} else {
echo $random ;
} }