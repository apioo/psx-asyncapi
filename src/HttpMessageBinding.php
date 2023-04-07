<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;


class HttpMessageBinding implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected mixed $headers = null;
    protected ?string $bindingVersion = null;
    public function setHeaders(mixed $headers) : void
    {
        $this->headers = $headers;
    }
    public function getHeaders() : mixed
    {
        return $this->headers;
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
        $record->put('headers', $this->headers);
        $record->put('bindingVersion', $this->bindingVersion);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

