<?php

namespace Oberon\Domain\Entities;

use Oberon\Domain\Entities\Fields\Document;
use Oberon\Domain\Entities\Fields\Name;

class Buyer {
    
    private Name $name;
    private Document $document;

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

        $this->name = new Name($attributes['name']);
        $this->document = new Document($attributes['document']);
    }

    public function getDate()
    {
        return [
            'name' => $this->name->getValue(),
            'document' => $this->document->getValue(),
        ];
    }
}