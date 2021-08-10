<?php

namespace App\Repository;

use App\Models\Buyer;
use Oberon\Ports\RepositoryInterface;

class BuyerRepository implements RepositoryInterface
{
    public function pagination(Array $params): array
    {
        return $params;
    }

    public function create(Array $params): array
    {
        $model = new Buyer();
        $model->name = $params['name'];
        $model->document = $params['document'];
        $model->save();
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
