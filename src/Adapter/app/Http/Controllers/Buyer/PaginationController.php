<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerPaginationUserCase;
use Oberon\Ports\RepositoryInterface;

class PaginationController extends BaseController
{
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new BuyerRepository();
    }

    public function execute()
    {
        $userCase = new BuyerPaginationUserCase($this->repository);
        dd($userCase->execute(['Pagination']));
    }
}
