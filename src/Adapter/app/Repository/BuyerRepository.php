<?php

namespace App\Repository;

use App\Models\Buyer;
use Oberon\Ports\Inputs\BuyerRequestOutput;
use Oberon\Ports\Inputs\PaginationRequestInput;
use Oberon\Ports\Outputs\PaginationRequestOutput;
use Oberon\Ports\RepositoryInterface;

class BuyerRepository implements RepositoryInterface
{
    public function pagination(PaginationRequestInput $request): PaginationRequestOutput
    {
        $criteria = $request->getCriteria();
        $response = Buyer::where($criteria)->paginate($request->getLimit())->toArray();
        return new PaginationRequestOutput(
            $response['current_page'],
            $response['last_page'],
            $response['per_page'],
            $response['data'],
        );
    }

    public function create(Array $params): BuyerRequestOutput
    {
        $model = new Buyer();
        $model->name = $params['name'];
        $model->document = $params['document'];
        $model->active = $params['active'];
        $model->save();

        return new BuyerRequestOutput(
            $model->id,
            $model->name,
            $model->document,
            $model->active,
            $model->created_at,
            $model->updated_at,
        );
    }

    public function update(Array $params): BuyerRequestOutput
    {
        $buyer = Buyer::find($params['id']);
        return new BuyerRequestOutput(
            $buyer->id,
            $buyer->name,
            $buyer->document,
            $buyer->active,
            $buyer->created_at,
            $buyer->updated_at,
        );
    }

    public function find(Int $id): BuyerRequestOutput
    {
        $buyer = Buyer::find($id);
        return new BuyerRequestOutput(
            $buyer->id,
            $buyer->name,
            $buyer->document,
            $buyer->active,
            $buyer->created_at,
            $buyer->updated_at,
        );
    }

    public function remove(Int $id): bool
    {
        return true;
    }
}
