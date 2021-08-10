<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\PaginationUserCaseInterface;

class BuyerPaginationUserCase implements PaginationUserCaseInterface
{

    public function execute(array $params): array
    {
        return $params;
    }
}
