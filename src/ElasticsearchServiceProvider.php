<?php

namespace xmarcos\Silex;

use Silex\Application;
use Elasticsearch\Client;
use InvalidArgumentException;
use Silex\ServiceProviderInterface;

class ElasticsearchServiceProvider implements ServiceProviderInterface
{
    protected $prefix;

    /**
     * @param string $prefix Prefix name used to register the service in Silex.
     */
    public function __construct($prefix = 'elasticsearch')
    {
        if (empty($prefix) || false === is_string($prefix)) {
            throw new InvalidArgumentException(
                sprintf('$prefix must be a non-empty string, "%s" given', gettype($prefix))
            );
        }

        $this->prefix = $prefix;
    }

    /**
     * {@inheritdoc}
     */
    public function register(Application $app)
    {
        $prefix           = $this->prefix;
        $params_key       = sprintf('%s.params', $prefix);
        $app[$params_key] = isset($app[$params_key]) ? $app[$params_key] : [];

        $app[$prefix] = $app->share(
            function (Application $app) use ($params_key) {
                return new Client($app[$params_key]);
            }
        );
    }

    /**
     * {@inheritdoc}
     */
    public function boot(Application $app)
    {
    }
}
