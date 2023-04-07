<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;


class OperationBindings implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?HttpOperationBinding $http = null;
    public function setHttp(?HttpOperationBinding $http) : void
    {
        $this->http = $http;
    }
    public function getHttp() : ?HttpOperationBinding
    {
        return $this->http;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('http', $this->http);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

