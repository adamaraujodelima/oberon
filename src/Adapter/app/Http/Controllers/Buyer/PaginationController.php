<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerPaginationUserCase;
use Oberon\Ports\RepositoryInterface;
use Oberon\Ports\Inputs\PaginationRequestInput;

class PaginationController extends BaseController
{
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new BuyerRepository();
    }

    public function execute(Request $request)
    {
        $userCasePagination = new BuyerPaginationUserCase($this->repository);
        $paginationRequest = new PaginationRequestInput(
            $request->get('limit') ?? 0,
            $request->get('offset') ?? 0,
            $request->get('page') ?? 0,
            $request->get('criteria') ?? [],
        );
        dd($userCasePagination->main($paginationRequest));
    }
}
