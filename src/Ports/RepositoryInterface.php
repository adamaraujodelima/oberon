<?php

namespace Oberon\Ports;

interface RepositoryInterface {
    public function pagination(Array $params): array;
    public function create(Array $params): array;
    public function update(Array $params): array;
    public function find(Int $id): array;
    public function remove(Int $id): array;
}
