<?php
require __DIR__ . '/vendor/autoload.php';

use CloudflareBypass\RequestMethod\CFStreamContext;

$stream_cf_wrapper = new CFStreamContext(array(
    'cache'         => true,  // Caching now enabled by default; stores clearance tokens in Cache folder
    'max_retries'   => 5      // Max attempts to try and get CF Clearance
));

$opts = array(
    'http' => array(
        'method'=>"GET",
        'header'=>
            "User-Agent:Mozilla/5.0 (Macintosh; Intel Mac OS X 10_11_6) AppleWebKit/537.36 (KHTML, like Gecko) Chrome/63.0.3239.132 Safari/537.36\r\n"
    )
);

$url = "https://demo.kodi.al/Streaming/Mixed_TV/Mixed_Music/V2Beat/"; // set your url
$player = file_get_contents($url, false, $stream_cf_wrapper->create($url, $opts));
echo $player;