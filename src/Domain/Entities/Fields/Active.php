<?php

namespace Oberon\Domain\Entities\Fields;

use UnexpectedValueException;

class Active
{

    private bool $value;

    public function __construct(bool $value = null)
    {
        $this->validate($value);
    }

    protected function validate($value)
    {
        if (!is_bool($value)) {
            throw new UnexpectedValueException("The value of field active is not a boolean!", 1);
        }

        $this->value = $value;
    }

    public function getValue(): bool
    {
        return $this->value;
    }
}
