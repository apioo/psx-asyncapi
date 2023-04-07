<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;

use PSX\Schema\Attribute\Enum;

class HttpOperationBinding implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    #[Enum(array('request', 'response'))]
    protected ?string $type = null;
    #[Enum(array('GET', 'POST', 'PUT', 'PATCH', 'DELETE', 'HEAD', 'OPTIONS', 'CONNECT', 'TRACE'))]
    protected ?string $method = null;
    protected mixed $query = null;
    protected ?string $bindingVersion = null;
    public function setType(?string $type) : void
    {
        $this->type = $type;
    }
    public function getType() : ?string
    {
        return $this->type;
    }
    public function setMethod(?string $method) : void
    {
        $this->method = $method;
    }
    public function getMethod() : ?string
    {
        return $this->method;
    }
    public function setQuery(mixed $query) : void
    {
        $this->query = $query;
    }
    public function getQuery() : mixed
    {
        return $this->query;
    }
    public function setBindingVersion(?string $bindingVersion) : void
    {
        $this->bindingVersion = $bindingVersion;
    }
    public function getBindingVersion() : ?string
    {
        return $this->bindingVersion;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('type', $this->type);
        $record->put('method', $this->method);
        $record->put('query', $this->query);
        $record->put('bindingVersion', $this->bindingVersion);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

