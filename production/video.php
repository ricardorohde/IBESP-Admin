<?php
require_once 'class/Db.php';
require_once 'class/YoutubeApi.php';
$request = new YoutubeApi();
$videos = $request->getVideos();
echo "a data de hoje é ". date('d/m/Y');
echo '<pre>';
print_r($videos);
echo '</pre>';
