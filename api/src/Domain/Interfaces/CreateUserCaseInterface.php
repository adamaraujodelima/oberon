<?php

namespace Oberon\Domain\Interfaces;

use Oberon\Domain\Entities\Buyer as EntitiesBuyer;

interface CreateUserCaseInterface
{
    public function execute(Array $params): array;
    public function validate(Array $data, EntitiesBuyer $buyer): array;
}
