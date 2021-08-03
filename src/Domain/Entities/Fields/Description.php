<?php

namespace Oberon\Domain\Entities\Fields;

class Description
{

    private String $value;

    public function __construct(String $value = null)
    {
        $this->value = $value;
        $this->validate();
    }

    protected function validate()
    {
        if (empty($this->value))
            throw new \Exception("The description field cannot be empty", 1);

        if (strlen($this->value) > 500)
            throw new \Exception("The description field cannot be greather than 500 characters", 1);

        if (strlen($this->value) < 50)
            throw new \Exception("The description field cannot be less than 50 characters", 1);
    }

    public function getValue(): string
    {
        return $this->value;
    }
}
