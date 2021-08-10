<?php

namespace Oberon\Domain\Interfaces;

interface PaginationUserCaseInterface
{
    public function execute(array $params): array;
}
