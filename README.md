# Disguz

An unofficial Disqus API client based on the [Guzzle 3](http://guzzle3.readthedocs.org/en/latest/index.html) PHP library.

## Usage

Get a Disguz instance by calling the factory method. Pass in an array of configuration settings:

```php
$config = [
	'api_key' => getenv('DISQUS_API_KEY'),
	'api_secret' => getenv('DISQUS_API_SECRET'),
	'access_token' => getenv('DISQUS_ACCESS_TOKEN'),
];
$client = Disguz::factory($config);
```

Then call one of the supported methods. Pass method parameters as an array:

```php
$params = [
	'message' => 'This is another test post',
	'thread' => $argv[1],
];
$result = $client->postsCreate($params);
```

## Supported Methods

The following methods are currently supported. For documentation on these API methods, visit https://disqus.com/api.

Support for additional methods is simply a matter of documenting them in `src/resources/disqus.json`, per the [Guzzle docs](http://guzzle3.readthedocs.org/en/latest/webservice-client/guzzle-service-descriptions.html). Please feel free to submit a pull request adding any methods from the Disqus API that you may require to this file.

### Threads

* threads/list
* threads/create
* threads/remove

### Posts

* posts/list
* posts/create
* posts/report
