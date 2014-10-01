<?php

require_once 'vendor/autoload.php';

use compwright\Disguz\Disguz;

// Create a client and pass an array of configuration data
$config = [
	'api_secret' => getenv('DISQUS_API_SECRET'),
];
$client = Disguz::factory($config);

$params = [
	'post' => $argv[1],
];

$result = $client->postsReport($params);

print_r($result);
