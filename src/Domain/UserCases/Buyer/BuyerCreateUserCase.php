<?php


namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;

class BuyerCreateUserCase extends MainUserCase implements CreateUserCaseInterface{

    public function execute(Array $params)
    {
        $entity = new Buyer($params);
        return $this->repository->create($entity->getData());
    }

    public function validate(Array $params)
    {
        return $params;
    }
}