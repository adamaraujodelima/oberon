<?php

namespace Oberon\Ports\Inputs;

final class BuyerCreateUpdateRequestInput
{
    private int $id;
    private string $name;
    private string $document;    
    private bool $active;


    public function __construct(string $name, string $document, bool $active, int $id = 0)
    {
        $this->id = $id;
        $this->name = $name;
        $this->document = $document;
        $this->active = $active;
    }
    
    public function getId(): int
    {
        return $this->id;
    }

    public function getName(): string
    {
        return $this->name;
    }

    public function getDocument(): string
    {
        return $this->document;
    }

    public function getActive(): bool
    {
        return $this->active;
    }
}
