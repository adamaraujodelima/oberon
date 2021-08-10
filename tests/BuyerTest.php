<?php

namespace Tests\Unit;

use DateTime;
use Oberon\Domain\Entities\Buyer;
use PHPUnit\Framework\TestCase;

class BuyerTest extends TestCase
{
    public function testFailWithoutAttributes(): void
    {
        $this->expectExceptionMessage('The variable attributes cannot be empty');
        $buyer = new Buyer();        
    }

    public function testFailWithEmptyNameField(): void
    {
        $this->expectExceptionMessage('The name field cannot be empty');
        $buyer = new Buyer([
            'name' => '',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),            
        ]);
    }

    public function testFailWithEmptyDocumentField(): void
    {
        $this->expectExceptionMessage('The document field cannot be empty');
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
    }

    public function testFailWithEmptyCreatedAtField(): void
    {
        $this->expectException(\TypeError::class);
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => '',
        ]);       
    }

    public function testFailWithEmptyUpdatedAtField(): void
    {
        $this->expectException(\TypeError::class);
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => '',
            'updatedAt' => new DateTime(),
        ]);
    }
}