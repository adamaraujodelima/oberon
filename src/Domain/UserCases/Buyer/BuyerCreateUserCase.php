<?php

declare(strict_types=1);

namespace Oberon\Domain\UserCases\Buyer;

use DateTime;
use Exception;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;
use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\Inputs\BuyerRequestOutput;

class BuyerCreateUserCase extends MainUserCase {

    public function execute(BuyerCreateUpdateRequestInput $request): BuyerRequestOutput
    {
        $dateNow = new DateTime();
        $params = array(
            'id' => $request->getId(),
            'name' => $request->getName(),
            'document' => $request->getDocument(),
            'active' => $request->getActive(),
            'createdAt' => $dateNow,
            'updatedAt' => $dateNow,
        );

        $buyer = new Buyer($params);
        
        if ($buyer->validate()) {            
            return $this->repository->create($request);
        }        
    }

    public function validate($data,$buyer): array
    {
        if(array_keys($buyer->getData()) != array_keys($data))
            throw new Exception("Response from repository is invalid!", 1);

        return $buyer->getData();            
    }
}