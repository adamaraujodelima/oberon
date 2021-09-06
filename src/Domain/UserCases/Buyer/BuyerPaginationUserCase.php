<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\PaginationUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;
use Oberon\Ports\Inputs\PaginationRequestInput;
class BuyerPaginationUserCase extends MainUserCase implements PaginationUserCaseInterface
{

    public function main(PaginationRequestInput $request): array
    {
        $params = [
            'limit' => $request->getLimit(),
            'ofsset' => $request->getOffset(),
            'page' => $request->getPage(),
        ];
        
        $response = $this->repository->pagination($params);        

        return $response->getData();
    }
}
