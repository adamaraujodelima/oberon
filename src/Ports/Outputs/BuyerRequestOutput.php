<?php

namespace Oberon\Ports\Inputs;

use DateTime;

final class BuyerRequestOutput
{
    private int $id;
    private string $name;
    private string $document;
    private bool $active;
    private DateTime $createdAt;
    private DateTime $updatedAt;


    public function __construct( int $id, string $name, string $document, bool $active, DateTime $createdAt, DateTime $updatedAt)
    {
        $this->id = $id;
        $this->name = $name;
        $this->document = $document;
        $this->active = $active;
        $this->createdAt = $createdAt;
        $this->updatedAt = $updatedAt;
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

    public function getCreatedAt(): DateTime
    {
        return $this->createdAt;
    }

    public function getUpdatedAt(): DateTime
    {
        return $this->updatedAt;
    }
}
