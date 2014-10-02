<?php

require_once 'vendor/autoload.php';

use compwright\Disguz\Disguz;

// Create a client and pass an array of configuration data
$config = [
	'disqus.keys' => [
		'api_key' => getenv('DISQUS_API_KEY'),
		'api_secret' => getenv('DISQUS_API_SECRET'),
		'access_token' => getenv('DISQUS_ACCESS_TOKEN'),
	],
];
$client = Disguz::factory($config);

$params = [
	'forum' => $argv[1],
	'title' => $argv[2],
];

$result = $client->threadsCreate($params);

print_r($result);
