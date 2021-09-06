<?php

namespace Oberon\Ports\Inputs;

final class PaginationRequestInput
{
    private int $limit;
    private int $offset;
    private int $page;

    public function __construct(int $limit, int $offset, int $page)
    {
        $this->limit = $limit;
        $this->offset = $offset;
        $this->page = $page;
    }

    public function getLimit(): int {
        return $this->limit;
    }

    public function getOffset(): int {
        return $this->offset;
    }

    public function getPage(): int {
        return $this->page;
    }
}
