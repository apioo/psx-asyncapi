<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;

use PSX\Schema\Attribute\Description;
use PSX\Schema\Attribute\Required;

#[Description('This is the root document object for the API specification. It combines resource listing and API declaration together into one document.')]
#[Required(array('asyncapi', 'info', 'channels'))]
class AsyncAPI implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $asyncapi = '2.6.0';
    protected ?\PSX\OpenAPI\Info $info = null;
    /**
     * @var array<\PSX\OpenAPI\Server>|null
     */
    protected ?array $servers = null;
    protected ?Channels $channels = null;
    protected ?Components $components = null;
    /**
     * @var array<\PSX\OpenAPI\Tag>|null
     */
    protected ?array $tags = null;
    protected ?\PSX\OpenAPI\ExternalDocs $externalDocs = null;
    public function setAsyncapi(?string $asyncapi) : void
    {
        $this->asyncapi = $asyncapi;
    }
    public function getAsyncapi() : ?string
    {
        return $this->asyncapi;
    }
    public function setInfo(?\PSX\OpenAPI\Info $info) : void
    {
        $this->info = $info;
    }
    public function getInfo() : ?\PSX\OpenAPI\Info
    {
        return $this->info;
    }
    /**
     * @param array<\PSX\OpenAPI\Server>|null $servers
     */
    public function setServers(?array $servers) : void
    {
        $this->servers = $servers;
    }
    public function getServers() : ?array
    {
        return $this->servers;
    }
    public function setChannels(?Channels $channels) : void
    {
        $this->channels = $channels;
    }
    public function getChannels() : ?Channels
    {
        return $this->channels;
    }
    public function setComponents(?Components $components) : void
    {
        $this->components = $components;
    }
    public function getComponents() : ?Components
    {
        return $this->components;
    }
    /**
     * @param array<\PSX\OpenAPI\Tag>|null $tags
     */
    public function setTags(?array $tags) : void
    {
        $this->tags = $tags;
    }
    public function getTags() : ?array
    {
        return $this->tags;
    }
    public function setExternalDocs(?\PSX\OpenAPI\ExternalDocs $externalDocs) : void
    {
        $this->externalDocs = $externalDocs;
    }
    public function getExternalDocs() : ?\PSX\OpenAPI\ExternalDocs
    {
        return $this->externalDocs;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('asyncapi', $this->asyncapi);
        $record->put('info', $this->info);
        $record->put('servers', $this->servers);
        $record->put('channels', $this->channels);
        $record->put('components', $this->components);
        $record->put('tags', $this->tags);
        $record->put('externalDocs', $this->externalDocs);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

