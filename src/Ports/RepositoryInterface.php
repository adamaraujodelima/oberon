<?php

namespace Oberon\Ports;

use Oberon\Ports\Outputs\PaginationRequestOutput;

interface RepositoryInterface {
    public function pagination(Array $params): PaginationRequestOutput;
    public function create(Array $params): array;
    public function update(Array $params): array;
    public function find(Int $id): array;
    public function remove(Int $id): array;
}
