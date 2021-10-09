<?php

namespace Oberon\Domain\Interfaces;

use Oberon\Ports\Inputs\PaginationRequestInput;

interface PaginationUserCaseInterface
{
    public function pagination(PaginationRequestInput $params): array;
}
