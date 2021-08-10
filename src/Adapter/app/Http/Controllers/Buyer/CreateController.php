<?php

namespace App\Http\Controllers\Buyer;

use App\Repository\BuyerRepository;
use Illuminate\Routing\Controller as BaseController;
use Oberon\Domain\UserCases\Buyer\BuyerCreateUserCase;
use Oberon\Ports\RepositoryInterface;

class CreateController extends BaseController
{
    private RepositoryInterface $repository;

    public function __construct()
    {
        $this->repository = new BuyerRepository();
    }

    public function execute()
    {
        $userCase = new BuyerCreateUserCase($this->repository);
        dd($userCase->execute([
            'name' => 'Adam Araujo de Lima',
            'document' => '41545645646546',
        ]));
    }
}
