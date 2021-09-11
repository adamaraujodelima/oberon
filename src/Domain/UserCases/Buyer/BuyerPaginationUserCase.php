<?php

namespace Oberon\Domain\UserCases\Buyer;

use Exception;
use Oberon\Domain\Interfaces\PaginationUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;
use Oberon\Ports\Inputs\PaginationRequestInput;
class BuyerPaginationUserCase extends MainUserCase implements PaginationUserCaseInterface
{

    private array $fieldsCriteria = ['name', 'document', 'active'];

    public function pagination(PaginationRequestInput $request): array
    {
        
        if ($request->getCriteria()) {
            $fieldsRequestCriteria = array_keys($request->getCriteria());
            if (array_diff($fieldsRequestCriteria, $this->fieldsCriteria)) {
                throw new Exception("The fields of parameter criteria is invalid!", 1);
            }
        }

        $response = $this->repository->pagination($request);        

        return $response->getData();
    }
}
