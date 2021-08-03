<?php

namespace Tests\Unit;

use DateTime;
use Domain\Entities\Buyer;
use Domain\Entities\Product;
use PHPUnit\Framework\TestCase;



class ProductTest extends TestCase
{

    public function testSuccessAllRequiredAttributes(): void
    {
        $buyer = new Buyer();

        $attributes = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Product Test',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];

        $productEntity = new Product($attributes);

        $this->assertTrue($productEntity->validate());
    }

    public function testFailWithoutAttributes(): void
    {
        $this->assertFalse(new Product());
    }

    public function testFailWithEmptyAttributes(): void
    {
        $attributes = [
            'buyer' => null,
            'name' => null,
            'description' => null,
            'active' => null,
            'createdAt' => null,
            'updatedAt' => null,
        ];

        $product = new Product($attributes);

        $this->assertFalse($product->validate());
    }

    public function testFailWithoutBuyer(): void
    {
         $attributes = [
            'name' => 'Product Test',
            'description' => 'Product Description',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];

        $product = new Product($attributes);

        $this->assertFalse($product->validate());
    }
}
