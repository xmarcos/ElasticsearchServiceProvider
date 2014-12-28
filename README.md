# ElasticsearchServiceProvider

[![Build Status](https://img.shields.io/travis/xmarcos/ElasticsearchServiceProvider/master.svg?style=flat-square)](https://travis-ci.org/xmarcos/ElasticsearchServiceProvider)
[![Coverage Status](https://img.shields.io/scrutinizer/coverage/g/xmarcos/ElasticsearchServiceProvider/master.svg?style=flat-square)](https://scrutinizer-ci.com/g/xmarcos/ElasticsearchServiceProvider/code-structure)
[![Quality Score](https://img.shields.io/scrutinizer/g/xmarcos/ElasticsearchServiceProvider.svg?style=flat-square)](https://scrutinizer-ci.com/g/xmarcos/ElasticsearchServiceProvider)
[![Latest Version](https://img.shields.io/packagist/v/xmarcos/elasticsearch-service-provider.svg?style=flat-square)](https://packagist.org/packages/xmarcos/elasticsearch-service-provider)
[![Software License](https://img.shields.io/packagist/l/xmarcos/elasticsearch-service-provider.svg?style=flat-square)](LICENSE)
[![Total Downloads](https://img.shields.io/packagist/dt/xmarcos/elasticsearch-service-provider.svg?style=flat-square)](https://packagist.org/packages/xmarcos/elasticsearch-service-provider)

A [Silex](https://github.com/silexphp/Silex) Service Provider for the official [Elasticsearch Client](https://github.com/elasticsearch/elasticsearch-php).

## Installation

```json
{
    "require": {
        "xmarcos/elasticsearch-service-provider": "dev-master"
    }
}
```

## Usage

```php
use Silex\Application;
use xmarcos\Silex\ElasticsearchServiceProvider

$app = new Application();
$app->register(new ElasticsearchServiceProvider(), [
    'elasticsearch.params' => [
        'hosts' => [
            '127.0.0.1:9200'
        ],
        'logging' => false
    ]
]);

$app['elasticsearch']->ping();
```

## License

MIT License
