<?php

declare(strict_types=1);

namespace Oberon\Domain\UserCases\Buyer;

use DateTime;
use Exception;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;
use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\Outputs\BuyerRequestOutput;

class BuyerCreateUserCase extends MainUserCase {

    public function create(BuyerCreateUpdateRequestInput $request): BuyerRequestOutput
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

        $buyerEntity = new Buyer($params);
        
        if ($buyerEntity->validate()) {            
            return $this->repository->create($request);
        }        
    }    
}
