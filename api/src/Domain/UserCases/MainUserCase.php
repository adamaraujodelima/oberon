<?php

namespace Oberon\Domain\UserCases;

use Illuminate\Cache\Repository;
use Oberon\Domain\Interfaces\CreateUserCaseInterface;
use Oberon\Domain\Interfaces\EditUserCaseInterface;
use Oberon\Ports\RepositoryInterface;

abstract class MainUserCase
{
    
    public RepositoryInterface $repository;

    public function __construct(RepositoryInterface $repository)
    {
        $this->repository = $repository;
    }
}
