<?php

class YoutubeApi extends Db{
    public function __construct()
    {
        //parent::__construct();
    }
    public function getVideos()
    {
        $username = 'IBESPONLINE';
        $apiKey = 'AIzaSyCSPAHPyBTGcGi4tt3lcq0lDqmMPtKbOlo';
        $qtdavideos = '48';
        $playlistId = 'UUozL4d4vV39zFix8SQiWmlQ';
        $channelUrl = "https://www.googleapis.com/youtube/v3/channels?forUsername={$username}&part=contentDetails&key={$apiKey}";
        $videosUrl = "https://www.googleapis.com/youtube/v3/playlistItems?part=snippet&maxResults={$qtdavideos}&key={$apiKey}";
        $url = $videosUrl."&playlistId=".$playlistId;
        $curl = curl_init($url);
        curl_setopt($curl, CURLOPT_RETURNTRANSFER, true);
        curl_setopt($curl, CURLOPT_FOLLOWLOCATION, true);
        $body = curl_exec($curl);
        curl_close($curl);
        return json_decode($body);
    }
}