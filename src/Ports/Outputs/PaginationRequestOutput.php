<?php

namespace Oberon\Ports\Outputs;

final class PaginationRequestOutput
{
    private int $currentPage;
    private int $lastPage;
    private int $limit;
    private array $items;

    public function __construct(int $currentPage, int $lastPage, int $limit, array $items)
    {
        $this->currentPage = $currentPage;
        $this->lastPage = $lastPage;
        $this->limit = $limit;
        $this->items = $items;
    }

    public function getData(): array
    {
        return [
            'currentPage' => $this->currentPage,
            'lastPage' => $this->lastPage,
            'limit' => $this->limit,
            'items' => $this->items,
        ];
    }
}
