<?php

require_once 'vendor/autoload.php';

use compwright\Disguz\Disguz;

// Create a client and pass an array of configuration data
$config = [
	'disqus.keys' => [
		'api_key' => getenv('DISQUS_API_KEY'),
	],
];
$client = Disguz::factory($config);

$params = [
	'forum' => $argv[1],
];
$result = $client->postsList($params);

print_r($result);
