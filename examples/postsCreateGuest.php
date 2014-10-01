<?php

require_once 'vendor/autoload.php';

use compwright\Disguz\Disguz;

// Create a client and pass an array of configuration data
$config = [
	// Do not pass the api_secret and access_token when guest posting
	'api_secret' => getenv('DISQUS_API_SECRET'),
];
$client = Disguz::factory($config);

$params = [
	'message' => 'This is a third test post by an anonymous guest',
	'thread' => $argv[1],
	'author_name' => 'Guest',
	'author_email' => 'someone@gmail.com'
];

$result = $client->postsCreate($params);

print_r($result);
