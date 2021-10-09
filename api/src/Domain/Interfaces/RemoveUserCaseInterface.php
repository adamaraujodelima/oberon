<?php

namespace Oberon\Domain\Interfaces;

interface RemoveUserCaseInterface
{
    public function execute(int $id);
    public function validate(int $id);
}
