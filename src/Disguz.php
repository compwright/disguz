<?php

namespace compwright\Disguz;

use Guzzle\Common\Collection;
use Guzzle\Common\Event;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

class Disguz extends Client
{
    public static function factory($config = [])
    {
        // Provide a hash of default client configuration options
        $default = [];

        // The following values are required when creating the client
        $required = [];

        // Merge in default settings and validate the config
        $config = Collection::fromConfig($config, $default, $required);
        $configArray = $config->toArray();

        // Create a new Disqus client
        $client = new self('https://disqus.com/api/3.0/', $config);

        // Set the service description
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/resources/disqus.json'));

        // Auto-add parameters to all requests
        $client->getEventDispatcher()->addListener(
        	'request.before_send',
        	function(Event $event) use ($configArray)
        	{
				$query = $event['request']->getQuery();
				foreach ($configArray as $key => $value)
				{
					$query->set($key, $value);
				}
			}
		);

        return $client;
    }
}
