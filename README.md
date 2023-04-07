
# AsynAPI

## About

This library contains model classes to generate an AsyncAPI specification in a type-safe way. The models are
automatically generated based on the [TypeSchema](https://typeschema.org/) specification (s. `typeschema.json`). The
following example shows how you can generate an OpenAPI spec:

```php
$info = new Info();
$info->setTitle('Account Service');
$info->setVersion('1.0.0');
$info->setDescription('This service is in charge of processing user signups :rocket:');

$message = new Message();
$message->setPayload(Record::fromArray(['$ref' => '#/components/schemas/Pet']));

$http = new HttpOperationBinding();
$http->setType('request');
$http->setMethod('POST');

$bindings = new OperationBindings();
$bindings->setHttp($http);

$operation = new Operation();
$operation->setMessage($message);
$operation->setBindings($bindings);

$channel = new Channel();
$channel->setPublish($operation);

$channels = new Channels();
$channels->put('user/signedup', $channel);

$schemas = new Schemas();
$schemas->put('Pet', [
    'required' => ['id', 'name'],
    'properties' => [
        'id' => ['type' => 'integer', 'format' => 'int64'],
        'name' => ['type' => 'string'],
        'tag' => ['type' => 'string'],
    ]
]);

$components = new Components();
$components->setSchemas($schemas);

$asyncAPI = new AsyncAPI();
$asyncAPI->setInfo($info);
$asyncAPI->setChannels($channels);
$asyncAPI->setComponents($components);

echo json_encode($asyncAPI, JSON_PRETTY_PRINT);

```

This would result in the following JSON:

```json
{
  "asyncapi": "2.6.0",
  "info": {
    "title": "Account Service",
    "description": "This service is in charge of processing user signups :rocket:",
    "version": "1.0.0"
  },
  "channels": {
    "user\/signedup": {
      "publish": {
        "bindings": {
          "http": {
            "type": "request",
            "method": "POST"
          }
        },
        "message": {
          "payload": {
            "$ref": "#\/components\/schemas\/Pet"
          }
        }
      }
    }
  },
  "components": {
    "schemas": {
      "Pet": {
        "required": [
          "id",
          "name"
        ],
        "properties": {
          "id": {
            "type": "integer",
            "format": "int64"
          },
          "name": {
            "type": "string"
          },
          "tag": {
            "type": "string"
          }
        }
      }
    }
  }
}
```

## Contribution

If you want to suggest changes please only change the `typeschema.json` specification and then run
the `php gen.php` script to regenerate all model classes.
