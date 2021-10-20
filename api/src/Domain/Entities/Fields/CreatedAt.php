<?php

namespace Oberon\Domain\Entities\Fields;

use DateTime;
use UnexpectedValueException;

class CreatedAt
{
    
    private DateTime $value;

    public function __construct(DateTime $value)
    {
        $this->validate($value);
        $this->value = $value;
    }

    private function validate($value)
    {
        if (empty($value)) {
            throw new UnexpectedValueException("The createdAt field cannot be empty", 1);
        }

        $now = new DateTime();
        $now->modify('- 1 minute');
        if ($value < $now) {
            throw new UnexpectedValueException("The createdAt field cannot be in the past", 1);
        }
            
        return true;
    }

    public function getValue()
    {
        return $this->value;
    }
}
