<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;


class Channel implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $description = null;
    protected ?Operation $subscribe = null;
    protected ?Operation $publish = null;
    protected ?\PSX\OpenAPI\Parameters $parameters = null;
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
    }
    public function setSubscribe(?Operation $subscribe) : void
    {
        $this->subscribe = $subscribe;
    }
    public function getSubscribe() : ?Operation
    {
        return $this->subscribe;
    }
    public function setPublish(?Operation $publish) : void
    {
        $this->publish = $publish;
    }
    public function getPublish() : ?Operation
    {
        return $this->publish;
    }
    public function setParameters(?\PSX\OpenAPI\Parameters $parameters) : void
    {
        $this->parameters = $parameters;
    }
    public function getParameters() : ?\PSX\OpenAPI\Parameters
    {
        return $this->parameters;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('description', $this->description);
        $record->put('subscribe', $this->subscribe);
        $record->put('publish', $this->publish);
        $record->put('parameters', $this->parameters);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

