<?php

namespace App\Repository;

use App\Models\Buyer;
use Oberon\Ports\RepositoryInterface;

class BuyerRepository implements RepositoryInterface
{
    public function pagination(Array $params): array
    {
        return Buyer::paginate(15)->toArray();
    }

    public function create(Array $params): array
    {
        $model = new Buyer();
        $model->name = $params['name'];
        $model->document = $params['document'];
        $model->active = $params['active'];
        $model->save();
        return [
            'id' => $model->id,
            'name' => $model->name,
            'document' => $model->document,
            'active' => $model->active,
            'createdAt' => $model->created_at,
            'updatedAt' => $model->updated_at,
        ];
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
