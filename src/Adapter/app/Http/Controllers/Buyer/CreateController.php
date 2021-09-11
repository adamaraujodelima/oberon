<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use DateTime;
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

    public function execute(Request $request)
    {
        $date = new DateTime();
        $userCase = new BuyerCreateUserCase($this->repository);
        $request = new BuyerCreateUpdateRequestInput(
            $request->get('name') ?? 'Adam A. de Lima',
            $request->get('document') ?? '14654564665464',
            $request->get('active') ?? false,
        );
        dd($userCase->create($request));
    }
}
