<?php

namespace Oberon\Ports;

use Oberon\Ports\Inputs\BuyerCreateUpdateRequestInput;
use Oberon\Ports\Outputs\BuyerRequestOutput;
use Oberon\Ports\Inputs\PaginationRequestInput;
use Oberon\Ports\Outputs\PaginationRequestOutput;

interface RepositoryInterface {
    public function pagination(PaginationRequestInput $request): PaginationRequestOutput;
    public function create(BuyerCreateUpdateRequestInput $request): BuyerRequestOutput;
    public function update(BuyerCreateUpdateRequestInput $request): BuyerRequestOutput;
    public function find(Int $id): BuyerRequestOutput;
    public function remove(Int $id): bool;
}
