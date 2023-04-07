<?php
/*
 * PSX is a open source PHP framework to develop RESTful APIs.
 * For the current version and informations visit <http://phpsx.org>
 *
 * Copyright 2010-2018 Christoph Kappestein <christoph.kappestein@gmail.com>
 *
 * Licensed under the Apache License, Version 2.0 (the "License");
 * you may not use this file except in compliance with the License.
 * You may obtain a copy of the License at
 *
 *     http://www.apache.org/licenses/LICENSE-2.0
 *
 * Unless required by applicable law or agreed to in writing, software
 * distributed under the License is distributed on an "AS IS" BASIS,
 * WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
 * See the License for the specific language governing permissions and
 * limitations under the License.
 */

namespace PSX\AsyncAPI\Tests;

use PHPUnit\Framework\TestCase;
use PSX\AsyncAPI\AsyncAPI;
use PSX\AsyncAPI\Channel;
use PSX\AsyncAPI\Channels;
use PSX\AsyncAPI\Components;
use PSX\AsyncAPI\HttpOperationBinding;
use PSX\AsyncAPI\Message;
use PSX\AsyncAPI\Operation;
use PSX\AsyncAPI\OperationBindings;
use PSX\AsyncAPI\Schemas;
use PSX\OpenAPI\Info;
use PSX\Record\Record;

/**
 * AsyncAPITest
 *
 * @author  Christoph Kappestein <christoph.kappestein@gmail.com>
 * @license http://www.apache.org/licenses/LICENSE-2.0
 * @link    http://phpsx.org
 */
class AsyncAPITest extends TestCase
{
    public function testModel()
    {
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

        $actual = json_encode($asyncAPI, JSON_PRETTY_PRINT);
        $expect = file_get_contents(__DIR__ . '/resources/asyncapi.json');

        $this->assertJsonStringEqualsJsonString($expect, $actual, $actual);
    }
}
