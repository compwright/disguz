<?php

namespace compwright\Disguz;

use Guzzle\Common\Collection;
use Guzzle\Common\Event;
use Guzzle\Plugin\Oauth\OauthPlugin;
use Guzzle\Service\Client;
use Guzzle\Service\Description\ServiceDescription;

/**
 * @method array threadsDetails()
 * @method array threadsCreate()
 * @method array threadsList()
 * @method array threadsPopular()
 * @method array threadsRemove()
 * @method array postsCreate()
 * @method array postsReport()
 * @method array postsList()
 */
class Disguz extends Client
{
    public static function factory($config = array())
    {
        // Provide a hash of default client configuration options
        $default = [];

        // The following values are required when creating the client
        $required = ['disqus.keys'];

        // Merge in default settings and validate the config
        $config = Collection::fromConfig($config, $default, $required);
        $apiKeys = $config->get('disqus.keys');

        // Create a new Disqus client
        $client = new self('https://disqus.com/api/3.0/', $config);

        // Set the service description
        $client->setDescription(ServiceDescription::factory(__DIR__ . '/resources/disqus.json'));

        // Auto-add parameters to all requests
        $client->getEventDispatcher()->addListener(
            'request.before_send',
            function(Event $event) use ($apiKeys)
            {
                $query = $event['request']->getQuery();
                foreach ($apiKeys as $key => $value)
                {
                    $query->set($key, $value);
                }
            }
        );

        return $client;
    }
}
