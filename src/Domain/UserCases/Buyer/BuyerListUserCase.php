<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\ListUserCaseInterface;

class BuyerListUserCase implements ListUserCaseInterface
{

    public function execute(array $params): array
    {
        return $params;
    }
}
