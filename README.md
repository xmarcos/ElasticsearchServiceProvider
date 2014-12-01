ElasticsearchServiceProvider
============================

A [Silex](https://github.com/silexphp/Silex) Service Provider for the official [Elasticsearch Client](https://github.com/elasticsearch/elasticsearch-php).

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

##License

MIT License
