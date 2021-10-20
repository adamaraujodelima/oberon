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
    private BuyerCreateUserCase $userCase;

    public function __construct()
    {
        $this->userCase = new BuyerCreateUserCase(new BuyerRepository());
    }

    public function main(Request $request): JsonResponse
    {
        $date = new DateTime();
        $request = new BuyerCreateUpdateRequestInput(
            $request->get('name') ?? '',
            $request->get('document') ?? '',
            $request->get('active') ?? false,
        );
        $buyer = $this->userCase->create($request);
        return new JsonResponse($buyer->toArray());
    }
}
