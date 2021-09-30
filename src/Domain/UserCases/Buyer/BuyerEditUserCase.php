<?php

namespace Oberon\Domain\UserCases\Buyer;

use DateTime;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Interfaces\EditUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;
use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\Outputs\BuyerRequestOutput;
use UnexpectedValueException;

final class BuyerEditUserCase extends MainUserCase
{

    public function edit(BuyerCreateUpdateRequestInput $request): BuyerRequestOutput
    {
        
        $buyer = $this->repository->find($request->getId());
        if (!$buyer) {
            throw new UnexpectedValueException("The Buyer entity was not found!", 1);
        }

        $params = array(
            'id' => $buyer->getId(),
            'name' => $request->getName(),
            'document' => $request->getDocument(),
            'active' => $request->getActive(),
            'createdAt' => $buyer->getCreatedAt(),
            'updatedAt' => new DateTime(),
        );

        $buyerEntity = new Buyer($params);
        
        if ($buyerEntity->validate()) {
            return $this->repository->update($request);
        }
    }
}
