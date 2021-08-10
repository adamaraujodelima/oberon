<?php

namespace Oberon\Domain\Interfaces;

interface CreateUserCaseInterface {
    public function execute(Array $params);
    public function validate(Array $params);
}