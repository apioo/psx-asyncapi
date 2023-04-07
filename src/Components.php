<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;

use PSX\Schema\Attribute\Description;

#[Description('Holds a set of reusable objects for different aspects of the OAS. All objects defined within the components object will have no effect on the API unless they are explicitly referenced from properties outside the components object.')]
class Components implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?Schemas $schemas = null;
    protected ?Messages $messages = null;
    public function setSchemas(?Schemas $schemas) : void
    {
        $this->schemas = $schemas;
    }
    public function getSchemas() : ?Schemas
    {
        return $this->schemas;
    }
    public function setMessages(?Messages $messages) : void
    {
        $this->messages = $messages;
    }
    public function getMessages() : ?Messages
    {
        return $this->messages;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('schemas', $this->schemas);
        $record->put('messages', $this->messages);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

