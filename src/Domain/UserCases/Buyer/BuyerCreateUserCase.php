<?php


namespace Oberon\Domain\UserCases\Buyer;

use Exception;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;

class BuyerCreateUserCase extends MainUserCase implements CreateUserCaseInterface{

    public function execute(Array $params): array
    {
        $buyer = new Buyer($params);
        $response = $this->repository->create($buyer->getData());
        return $this->validate($response, $buyer);
    }

    public function validate($data,$buyer): array
    {
        if(array_keys($buyer->getData()) !== array_keys($data))
            throw new Exception("Response from repository is invalid!", 1);
        return $buyer->getData();            
    }
}