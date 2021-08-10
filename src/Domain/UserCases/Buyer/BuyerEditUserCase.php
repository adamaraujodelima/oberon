<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\EditUserCaseInterface;

class BuyerEditUserCase implements EditUserCaseInterface
{

    public function execute(int $id, array $params)
    {
        return $params;
    }

    public function validate(array $params)
    {
        # code...
    }
}
