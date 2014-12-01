<?php

namespace xmarcos\Silex;

use ReflectionClass;
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

    public function testRegisterWithParams()
    {
        $app = new Application();
        $app->register(new ElasticsearchServiceProvider(), [
            'elasticsearch.params' => [
                'logging' => true,
                'logPath' => '/path/to/elasticsearch.log',

            ]
        ]);

        $reflection = new ReflectionClass($app['elasticsearch']);

        $params = $reflection->getProperty('params');
        $params->setAccessible(true);

        $pimple = $params->getValue($app['elasticsearch']);

        $this->assertTrue(isset($pimple['logging']));
        $this->assertTrue(isset($pimple['logPath']));

        $this->assertEquals(true, $pimple['logging']);
        $this->assertEquals('/path/to/elasticsearch.log', $pimple['logPath']);
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
