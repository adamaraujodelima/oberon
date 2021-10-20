<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerEditUserCase;
use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\RepositoryInterface;

class EditController extends BaseController
{
    private BuyerEditUserCase $userCase;

    public function __construct()
    {
        $this->userCase = new BuyerEditUserCase(new BuyerRepository());
    }

    public function main(int $id = 0, Request $request): JsonResponse
    {
        $request = new BuyerCreateUpdateRequestInput(
            $request->get('name') ?? 'Adam Araujo de Lima',
            $request->get('document') ?? '465415646464654',
            $request->get('active') ?? false,
            $id,
        );

        dd($this->userCase->edit($request));
    }
}
