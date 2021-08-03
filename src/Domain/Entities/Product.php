<?php

namespace Oberon\Domain\Entities;

use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Entities\Fields\CreatedAt;
use Oberon\Domain\Entities\Fields\Description;
use Oberon\Domain\Entities\Fields\Name;
use Oberon\Domain\Entities\Fields\UpdatedAt;

class Product
{
    private bool $active;
    private Name $name;
    private Description $description;
    private Buyer $buyer;
    private CreatedAt $createdAt;
    private UpdatedAt $updatedAt;

    public function __construct(array $attributes = [])
    {
        $this->bind($attributes);        
    }  

    protected function bind($attributes)
    {
        if(!is_array($attributes))
            throw new \Exception("The variable attributes must be an array", 1);
            
        if(empty($attributes))
            throw new \Exception("The variable attributes cannot be empty", 1);

        $this->name = new Name($attributes['name']);
        $this->description = new Description($attributes['description']);
        $this->createdAt = new CreatedAt($attributes['createdAt']);
        $this->updatedAt = new UpdatedAt($attributes['updatedAt']);
        $this->buyer = $attributes['buyer'];
        $this->active = $attributes['active'];

        return true;      
    }

    public function getData()
    {
        return [
            'name' => $this->name->getValue(),
            'description' => $this->description->getValue(),
            'createdAt' => $this->createdAt->getValue(),
            'updatedAt' => $this->updatedAt->getValue(),
            'active' => $this->active,
            'buyer' => $this->buyer,
        ];
    }
}
