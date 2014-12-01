<?php

namespace xmarcos\Silex;

use Silex\Application;
use Elasticsearch\Client;
use PHPUnit_Framework_TestCase;

class ElasticsearchServiceProviderTest extends PHPUnit_Framework_TestCase
{
    public function testRegisterWithoutPrefix()
    {
        $app = new Application();
        $app->register(new ElasticsearchServiceProvider());

        $this->assertTrue($app['elasticsearch'] instanceof Client);
    }

    public function testRegisterWithPrefix()
    {
        $app = new Application();
        $app->register(new ElasticsearchServiceProvider('es'));

        $this->assertTrue($app['es'] instanceof Client);
    }

    /**
     * @expectedException Elasticsearch\Common\Exceptions\Curl\CouldNotConnectToHost
     * @expectedExceptionMessage 127.0.0.1:1234
     */
    public function testRegisterWithParams()
    {
        $app = new Application();
        $app->register(new ElasticsearchServiceProvider(), [
            'elasticsearch.params' => [
                'hosts' => [
                    '127.0.0.1:1234',
                ],
            ]
        ]);

        $app['elasticsearch']->ping();
    }

    /**
     * @expectedException \InvalidArgumentException
     */
    public function testRegisterException()
    {
        $app = new Application();
        $app->register(new ElasticsearchServiceProvider(mt_rand()));
    }
}
