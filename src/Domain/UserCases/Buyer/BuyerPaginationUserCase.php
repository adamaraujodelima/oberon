<?php

namespace Oberon\Domain\UserCases\Buyer;

use Oberon\Domain\Interfaces\PaginationUserCaseInterface;
use Oberon\Domain\UserCases\MainUserCase;

class BuyerPaginationUserCase extends MainUserCase implements PaginationUserCaseInterface
{

    public function execute(array $params): array
    {
        return $this->repository->pagination($params);
    }
}
