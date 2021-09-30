<?php

declare(strict_types=1);

namespace Oberon\Domain\Entities;

use DateTime;
use Oberon\Domain\Entities\Fields\Active;
use Oberon\Domain\Entities\Fields\CreatedAt;
use Oberon\Domain\Entities\Fields\Document;
use Oberon\Domain\Entities\Fields\Name;
use Oberon\Domain\Entities\Fields\PrimaryKey;
use Oberon\Domain\Entities\Fields\UpdatedAt;
use UnexpectedValueException;

final class Buyer
{
    
    private PrimaryKey $id;
    private Name $name;
    private Document $document;
    private CreatedAt $createdAt;
    private UpdatedAt $updatedAt;
    private Active $active;
    private array $attributes;

    public function __construct(Array $attributes = [])
    {
        $this->attributes = $attributes;
    }

    public function validate(): bool
    {
        if (!is_array($this->attributes)) {
            throw new UnexpectedValueException("The variable attributes must be an array", 1);
        }

        if (empty($this->attributes)) {
            throw new UnexpectedValueException("The variable attributes cannot be empty", 1);
        }

        $this->id = new PrimaryKey($this->attributes['id'] ?? 0);
        $this->name = new Name($this->attributes['name'] ?? null);
        $this->document = new Document($this->attributes['document'] ?? null);
        $this->active = new Active($this->attributes['active'] ?? false);
        $this->createdAt = new CreatedAt($this->attributes['createdAt'] ?? new DateTime());
        $this->updatedAt = new UpdatedAt($this->attributes['updatedAt'] ?? new DateTime());

        return true;
    }

    public function getData(): array
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
