<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\RemoveUserCaseInterface;

class BuyerRemoveUserCase implements RemoveUserCaseInterface
{

    public function execute(int $id)
    {
        return $id;
    }

    public function validate(int $id)
    {
        return $id;
    }
}
