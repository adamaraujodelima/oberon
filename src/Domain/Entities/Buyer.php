<?php

namespace Oberon\Domain\Entities;

use DateTime;
use Oberon\Domain\Entities\Fields\Active;
use Oberon\Domain\Entities\Fields\CreatedAt;
use Oberon\Domain\Entities\Fields\Document;
use Oberon\Domain\Entities\Fields\Name;
use Oberon\Domain\Entities\Fields\PrimaryKey;
use Oberon\Domain\Entities\Fields\UpdatedAt;
use UnexpectedValueException;

class Buyer {
    
    private PrimaryKey $id;
    private Name $name;
    private Document $document;
    private CreatedAt $createdAt;
    private UpdatedAt $updatedAt;
    private Active $active;

    public function __construct(Array $attributes = [])
    {
        $this->bind($attributes);
    }

    protected function bind($attributes)
    {
        if (!is_array($attributes)){
            throw new UnexpectedValueException("The variable attributes must be an array", 1);
        }

        if (empty($attributes)){
            throw new UnexpectedValueException("The variable attributes cannot be empty", 1);
        }

        $this->id = new PrimaryKey($attributes['id'] ?? 0);
        $this->name = new Name($attributes['name'] ?? null);
        $this->document = new Document($attributes['document'] ?? null);
        $this->active = new Active($attributes['active'] ?? false);
        $this->createdAt = new CreatedAt($attributes['createdAt'] ?? new DateTime());
        $this->updatedAt = new UpdatedAt($attributes['updatedAt'] ?? new DateTime());
    }

    public function getData()
    {
        return [
            'id' => $this->id->getValue(),
            'name' => $this->name->getValue(),
            'document' => $this->document->getValue(),
            'active' => $this->active->getValue(),
            'createdAt' => $this->createdAt->getValue(),
            'updatedAt' => $this->updatedAt->getValue(),
        ];
    }
}