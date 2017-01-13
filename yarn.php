<?php

require_once "vendor/autoload.php";

$dir = str_replace(' ', '-', $argv[1]);

/*
 * Search Yarn for movie clips for a given keyword
 */
$client = new GuzzleHttp\Client();
$resp = $client->request("GET", "http://www.tzr.io/yarn-find?text=" . $argv[1]);

/*
 * Extract all the clip ID's
 */
$re = "/yarn-clip\/([a-z0-9-]+)/";
preg_match_all($re, $resp->getBody(), $matches);

/*
 * Create directory to store new clips
 */
mkdir(__DIR__ . "/videos/{$dir}", 0700);

/*
 * Loop through the clip ID's and download the MP4 of each clip
 */
foreach($matches[1] as $key => $videoID) {
	$client->request('GET', "https://storage.googleapis.com/vidsums/{$videoID}.mp4", [
    	'sink' => __DIR__ . "/videos/{$dir}/" .  $dir . "-{$key}.mp4"
	]);
}