<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerEditUserCase;
use Oberon\Ports\RepositoryInterface;

class EditController extends BaseController
{
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new BuyerRepository();
    }

    public function execute()
    {
        $userCase = new BuyerEditUserCase($this->repository);
        dd($userCase->execute(1,[]));
    }
}
