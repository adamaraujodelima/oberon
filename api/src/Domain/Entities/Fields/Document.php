<?php

namespace Oberon\Domain\Entities\Fields;

use UnexpectedValueException;

class Document
{

    private String $value;
    
    public function __construct(String $value)
    {
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
        if (empty($this->value)) {
            throw new UnexpectedValueException("The document field cannot be empty", 1);
        }

        if (strlen($this->value) > 50) {
            throw new UnexpectedValueException("The document field cannot be greather than 50 characters", 1);
        }

        if (strlen($this->value) < 5) {
            throw new UnexpectedValueException("The document field cannot be less than 5 characters", 1);
        }

        return true;
    }

    public function getValue()
    {
        return $this->value;
    }
}
