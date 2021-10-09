<?php

namespace Oberon\Domain\Entities\Fields;

use UnexpectedValueException;

class Name
{
    
    private String $value;

    public function __construct(String $value = null)
    {
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
        if (empty($this->value)) {
            throw new UnexpectedValueException("The name field cannot be empty", 1);
        }

        if (strlen($this->value) > 100) {
            throw new UnexpectedValueException("The name field cannot be greather than 100 characters", 1);
        }

        if (strlen($this->value) < 5) {
            throw new UnexpectedValueException("The name field cannot be less than 5 characters", 1);
        }
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
