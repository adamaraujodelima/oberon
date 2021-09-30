<?php

namespace Oberon\Domain\Entities\Fields;

use DateTime;
use UnexpectedValueException;

class UpdatedAt
{

    private DateTime $value;

    public function __construct(DateTime $value)
    {
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
        if (empty($this->value)) {
            throw new UnexpectedValueException("The updatedAt field cannot be empty", 1);
        }

        $now = new DateTime();
        $now->modify('- 1 minute'); // The runtime code happen with diference in execution from construct the another classes
        if ($this->value < $now) {
            throw new UnexpectedValueException("The updatedAt field cannot be in the past", 1);
        }

        return true;
    }

    public function getValue()
    {
        return $this->value;
    }
}
