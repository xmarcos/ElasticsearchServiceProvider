# ElasticsearchServiceProvider [![Build Status](https://travis-ci.org/xmarcos/ElasticsearchServiceProvider.svg?branch=master)](https://travis-ci.org/xmarcos/ElasticsearchServiceProvider)

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
