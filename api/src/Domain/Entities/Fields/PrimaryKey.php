<?php

namespace Oberon\Domain\Entities\Fields;

use UnexpectedValueException;

class PrimaryKey
{

    private int $value;

    public function __construct(int $value = null)
    {
        $this->validate($value);
    }

    protected function validate($value)
    {
        if (!is_int($value)) {
            throw new UnexpectedValueException("The value is not integer!", 1);
        }

        $this->value = $value;
    }

    public function getValue(): int
    {
        return $this->value;
    }
}
