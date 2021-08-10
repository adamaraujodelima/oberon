<?php

namespace App\Repository;

use Oberon\Ports\RepositoryInterface;

class BuyerRepository implements RepositoryInterface
{
    public function pagination(Array $params): array
    {
        return $params;
    }

    public function create(Array $params): array
    {
        return $params;
    }

    public function update(Array $params): array
    {
        return $params;
    }

    public function find(Int $id): array
    {
        return [];
    }

    public function remove(Int $id): array
    {
        return [];
    }
}
