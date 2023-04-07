<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;


class Operation implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected ?string $operationId = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    /**
     * @var array<\PSX\OpenAPI\Tag>|null
     */
    protected ?array $tags = null;
    protected ?\PSX\OpenAPI\ExternalDocs $externalDocs = null;
    protected ?OperationBindings $bindings = null;
    protected ?Message $message = null;
    public function setOperationId(?string $operationId) : void
    {
        $this->operationId = $operationId;
    }
    public function getOperationId() : ?string
    {
        return $this->operationId;
    }
    public function setSummary(?string $summary) : void
    {
        $this->summary = $summary;
    }
    public function getSummary() : ?string
    {
        return $this->summary;
    }
    public function setDescription(?string $description) : void
    {
        $this->description = $description;
    }
    public function getDescription() : ?string
    {
        return $this->description;
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
    public function setBindings(?OperationBindings $bindings) : void
    {
        $this->bindings = $bindings;
    }
    public function getBindings() : ?OperationBindings
    {
        return $this->bindings;
    }
    public function setMessage(?Message $message) : void
    {
        $this->message = $message;
    }
    public function getMessage() : ?Message
    {
        return $this->message;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('operationId', $this->operationId);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('tags', $this->tags);
        $record->put('externalDocs', $this->externalDocs);
        $record->put('bindings', $this->bindings);
        $record->put('message', $this->message);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

