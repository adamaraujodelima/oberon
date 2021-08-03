<?php

namespace Oberon\Domain\Entities;

use DateTime;
use Oberon\Domain\Entities\Buyer;

class Product
{
    private bool $active;
    private String $name;
    private String $description;
    private Buyer $buyer;
    private DateTime $createdAt;
    private DateTime $updatedAt;

    public function __construct(array $attributes = [])
    {
        $this->validate($attributes);
        $this->buyer = $attributes['buyer'];
        $this->name = $attributes['name'];
        $this->description = $attributes['description'];
        $this->active = $attributes['active'];
        $this->createdAt = $attributes['createdAt'];
        $this->updatedAt = $attributes['updatedAt'];
    }  

    protected function validate($attributes)
    {
        if(!is_array($attributes))
            throw new \Exception("The variable attributes must be an array", 1);
            
        if(empty($attributes))
            throw new \Exception("The variable attributes cannot be empty", 1);

        foreach ($attributes as $key => $value) {
            if(empty($value))
                throw new \Exception("The $key cannot be empty", 1);
        }

        return true;      
    }

    public function getData()
    {
        return [
            'buyer' => $this->buyer,
            'name' => $this->name,
            'description' => $this->description,
            'active' => $this->active,
            'createdAt' => $this->createdAt,
            'updatedAt' => $this->updatedAt,
        ];
    }
}
