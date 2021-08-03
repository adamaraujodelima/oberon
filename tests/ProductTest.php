<?php

namespace Tests\Unit;

use DateTime;
use Exception;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Entities\Product;
use PHPUnit\Framework\TestCase;


class ProductTest extends TestCase
{

    public function testFailWithoutAttributes(): void
    {
        try {
            $product = new Product();
        } catch (\Exception $e) {            
            $this->assertEquals('The variable attributes cannot be empty',$e->getMessage());
        }        
    }

    public function testSuccessAllRequiredAttributes(): void
    {
        $buyer = new Buyer();
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Product Test',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];

        $productEntity = new Product($attrs);
        $productData = $productEntity->getData();

        $this->assertInstanceOf(Product::class, $productEntity);
        $this->assertIsArray($productData);
        $this->assertEquals(6,count($productData));
        $this->assertArrayHasKey('buyer',$productData);
        $this->assertArrayHasKey('name',$productData);
        $this->assertArrayHasKey('description',$productData);
        $this->assertArrayHasKey('active',$productData);
        $this->assertArrayHasKey('createdAt',$productData);
        $this->assertArrayHasKey('updatedAt',$productData);
        $this->assertInstanceOf(Buyer::class, $productData['buyer']);
    }    

    public function testFailWithSomeEmptyAttributes(): void
    {
        $attributes = [
            'buyer' => '',
            'name' => '',
            'description' => '',
            'active' => '',
            'createdAt' => '',
            'updatedAt' => '',
        ];

        foreach($attributes as $key => $value) {
            try {            
                $attrs = [
                    $key => $value,
                ];
                $product = new Product($attrs);        
            } catch (\Exception $e) {
                $this->assertEquals("The $key cannot be empty", $e->getMessage());
            }
        }
    }

    public function testFailWithLargeNameField(): void
    {
        try {
            $buyer = new Buyer();
            $attrs = [
                'buyer' => $buyer,
                'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris.',
                'description' => 'Test with description',
                'active' => true,
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
            ];
            $product = new Product($attrs);
        } catch (\Exception $e) {
            $this->assertEquals("The name cannot be greather than 100 characters", $e->getMessage());
        }
    }

    public function testFailWithLargeDescriptionField(): void
    {
        try {
            $buyer = new Buyer();
            $attrs = [
                'buyer' => $buyer,
                'name' => 'Product Test',                
                'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris.',
                'active' => true,
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime(),
            ];
            $product = new Product($attrs);
        } catch (\Exception $e) {
            $this->assertEquals("The description cannot be greather than 500 characters", $e->getMessage());
        }
    }

    public function testFailWithCreatedAtFieldInThePast(): void
    {
        try {
            $buyer = new Buyer();
            $attrs = [
                'buyer' => $buyer,
                'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'description' => 'Test with description',
                'active' => true,
                'createdAt' => new DateTime('1970-01-01 00:00:00'),
                'updatedAt' => new DateTime(),
            ];
            $product = new Product($attrs);
        } catch (\Exception $e) {
            $this->assertEquals("The createdAt cannot be in the past", $e->getMessage());
        }
    }

    public function testFailWithUpdatedAtFieldInThePast(): void
    {
        try {
            $buyer = new Buyer();
            $attrs = [
                'buyer' => $buyer,
                'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
                'description' => 'Test with description',
                'active' => true,                
                'createdAt' => new DateTime(),
                'updatedAt' => new DateTime('1970-01-01 00:00:00'),
            ];
            $product = new Product($attrs);
        } catch (\Exception $e) {
            $this->assertEquals("The updatedAt cannot be in the past", $e->getMessage());
        }
    }
}
