<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use DateTime;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerCreateUserCase;
use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\RepositoryInterface;

class CreateController extends BaseController
{
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new BuyerRepository();
    }

    public function execute(Request $request): JsonResponse
    {
        $date = new DateTime();
        $userCase = new BuyerCreateUserCase($this->repository);
        $request = new BuyerCreateUpdateRequestInput(
            $request->get('name') ?? '',
            $request->get('document') ?? '',
            $request->get('active') ?? false,
        );

        $buyer = $userCase->create($request);

        return new JsonResponse($buyer->toArray());
    }
}
