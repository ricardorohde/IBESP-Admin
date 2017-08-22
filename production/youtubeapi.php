<?php
// Usuário e ApiKey do Youtube
$username = 'IBESPONLINE';
// Crie uma API KEY no https://code.google.com/apis/console, não se esqueça de habilitar o Youtube Data API
$apiKey = 'AIzaSyCSPAHPyBTGcGi4tt3lcq0lDqmMPtKbOlo';
// Até quantos vídeos por página?
$qtdavideos = '48';
// Informa o ID do canal manualmente
$playlistId = 'UUozL4d4vV39zFix8SQiWmlQ';
// URL das APIs
$channelUrl = "https://www.googleapis.com/youtube/v3/channels?forUsername={$username}&part=contentDetails&key={$apiKey}";
$videosUrl = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults={$qtdavideos}&key={$apiKey}";
// https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults=48&key=AIzaSyCSPAHPyBTGcGi4tt3lcq0lDqmMPtKbOlo&playlistId=UUozL4d4vV39zFix8SQiWmlQ

// Para obter mais resultados alem do que está definido a variavel $qtdavideos e preciso consultar o valor do parametro "nextPageToken" ou "prevPageToken"

function request($url) {
    $curl = curl_init($url);
    curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
    curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
    $body = curl_exec($curl);
    curl_close($curl);
    return json_decode($body);
}

//$channel = request($channelUrl)->items[0]->contentDetails;
//$playlistId = $channel->relatedPlaylists->uploads;
$videos = request("{$videosUrl}&playlistId={$playlistId}");
//$nextpage = request("{$videosUrl}&playlistId={$playlistId}")->nextPageToken;
//$prevpage = request("{$videosUrl}&playlistId={$playlistId}")->prevPageToken;
echo '<pre>';
echo $videos->items[0]->snippet->title;
echo '</pre>';