<?php

declare(strict_types = 1);

namespace PSX\AsyncAPI;


class Message implements \JsonSerializable, \PSX\Record\RecordableInterface
{
    protected mixed $headers = null;
    protected mixed $payload = null;
    protected ?string $correlationId = null;
    protected ?string $schemaFormat = null;
    protected ?string $contentType = null;
    protected ?string $name = null;
    protected ?string $title = null;
    protected ?string $summary = null;
    protected ?string $description = null;
    /**
     * @var array<\PSX\OpenAPI\Tag>|null
     */
    protected ?array $tags = null;
    protected ?\PSX\OpenAPI\ExternalDocs $externalDocs = null;
    protected ?MessageBindings $bindings = null;
    public function setHeaders(mixed $headers) : void
    {
        $this->headers = $headers;
    }
    public function getHeaders() : mixed
    {
        return $this->headers;
    }
    public function setPayload(mixed $payload) : void
    {
        $this->payload = $payload;
    }
    public function getPayload() : mixed
    {
        return $this->payload;
    }
    public function setCorrelationId(?string $correlationId) : void
    {
        $this->correlationId = $correlationId;
    }
    public function getCorrelationId() : ?string
    {
        return $this->correlationId;
    }
    public function setSchemaFormat(?string $schemaFormat) : void
    {
        $this->schemaFormat = $schemaFormat;
    }
    public function getSchemaFormat() : ?string
    {
        return $this->schemaFormat;
    }
    public function setContentType(?string $contentType) : void
    {
        $this->contentType = $contentType;
    }
    public function getContentType() : ?string
    {
        return $this->contentType;
    }
    public function setName(?string $name) : void
    {
        $this->name = $name;
    }
    public function getName() : ?string
    {
        return $this->name;
    }
    public function setTitle(?string $title) : void
    {
        $this->title = $title;
    }
    public function getTitle() : ?string
    {
        return $this->title;
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
    public function setBindings(?MessageBindings $bindings) : void
    {
        $this->bindings = $bindings;
    }
    public function getBindings() : ?MessageBindings
    {
        return $this->bindings;
    }
    public function toRecord() : \PSX\Record\RecordInterface
    {
        /** @var \PSX\Record\Record<mixed> $record */
        $record = new \PSX\Record\Record();
        $record->put('headers', $this->headers);
        $record->put('payload', $this->payload);
        $record->put('correlationId', $this->correlationId);
        $record->put('schemaFormat', $this->schemaFormat);
        $record->put('contentType', $this->contentType);
        $record->put('name', $this->name);
        $record->put('title', $this->title);
        $record->put('summary', $this->summary);
        $record->put('description', $this->description);
        $record->put('tags', $this->tags);
        $record->put('externalDocs', $this->externalDocs);
        $record->put('bindings', $this->bindings);
        return $record;
    }
    public function jsonSerialize() : object
    {
        return (object) $this->toRecord()->getAll();
    }
}

