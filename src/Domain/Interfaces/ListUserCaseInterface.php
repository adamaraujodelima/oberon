<?php

namespace Oberon\Domain\Interfaces;

interface ListUserCaseInterface
{
    public function execute(array $params): array;
}
