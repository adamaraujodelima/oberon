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
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->userCase = new BuyerEditUserCase(new BuyerRepository());
    }

    public function main(Request $request): JsonResponse
    {
        $request = new BuyerCreateUpdateRequestInput(
            $request->get('name') ?? '',
            $request->get('document') ?? '',
            $request->get('active') ?? false,
        );

        dd($this->userCase->edit($request));
    }
}
