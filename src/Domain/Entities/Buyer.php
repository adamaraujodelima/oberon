<?php

namespace Oberon\Domain\Entities;

use DateTime;
use Oberon\Domain\Entities\Fields\CreatedAt;
use Oberon\Domain\Entities\Fields\Document;
use Oberon\Domain\Entities\Fields\Name;
use Oberon\Domain\Entities\Fields\UpdatedAt;

class Buyer {
    
    private Name $name;
    private Document $document;
    private CreatedAt $createdAt;
    private UpdatedAt $updatedAt;
    private bool $active;

    public function __construct(Array $attributes = [])
    {
        $this->bind($attributes);
    }

    protected function bind($attributes)
    {
        if (!is_array($attributes))
            throw new \Exception("The variable attributes must be an array", 1);

        if (empty($attributes))
            throw new \Exception("The variable attributes cannot be empty", 1);

        $this->name = new Name($attributes['name'] ?? null);
        $this->document = new Document($attributes['document'] ?? null);
        $this->createdAt = new CreatedAt($attributes['createdAt'] ?? new DateTime());
        $this->updatedAt = new UpdatedAt($attributes['updatedAt'] ?? new DateTime());
        $this->active = boolval($attributes['active'] ?? false);
    }

    public function getData()
    {
        return [
            'name' => $this->name->getValue(),
            'document' => $this->document->getValue(),
            'active' => $this->active,
            'createdAt' => $this->createdAt->getValue(),
            'updatedAt' => $this->updatedAt->getValue(),
        ];
    }
}