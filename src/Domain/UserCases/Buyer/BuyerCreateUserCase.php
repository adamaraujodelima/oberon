<?php


namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;

class BuyerCreateUserCase extends MainUserCase implements CreateUserCaseInterface{

    public function execute(Array $params)
    {
        return $this->repository->create($params);
    }

    public function validate(Array $params)
    {
        return $params;
    }
}