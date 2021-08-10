<?php

namespace Oberon\Domain\Interfaces;

interface EditUserCaseInterface
{
    public function execute(int $id, array $params);
    public function validate(array $params);
}
