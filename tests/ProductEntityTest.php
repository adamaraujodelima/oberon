<?php

namespace Tests\Unit;

use DateTime;
use Oberon\Domain\Entities\Buyer;
use Oberon\Domain\Entities\Product;
use PHPUnit\Framework\TestCase;

final class ProductEntityTest extends TestCase
{

    public function testSuccessAllRequiredAttributes(): void
    {
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);

        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];

        $productEntity = new Product($attrs);
        $productData = $productEntity->getData();

        $this->assertInstanceOf(Product::class, $productEntity);
        $this->assertIsArray($productData);
        $this->assertEquals(6, count($productData));
        $this->assertArrayHasKey('buyer', $productData);
        $this->assertArrayHasKey('name', $productData);
        $this->assertArrayHasKey('description', $productData);
        $this->assertArrayHasKey('active', $productData);
        $this->assertArrayHasKey('createdAt', $productData);
        $this->assertArrayHasKey('updatedAt', $productData);
        $this->assertInstanceOf(Buyer::class, $productData['buyer']);
    }    


    public function testFailWithoutAttributes(): void
    {
        $this->expectExceptionMessage('The variable attributes cannot be empty');
        $product = new Product();
    }
   
    public function testFailWithEmptyBuyerField(): void
    {        
        $this->expectExceptionMessage("The variable attributes cannot be empty");
        $buyer = new Buyer();
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);
    }

    public function testFailWithEmptyNameField(): void
    {        
        $this->expectExceptionMessage("The name field cannot be empty");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);

        $attrs = [
            'buyer' => $buyer,
            'name' => '',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);
    }

    public function testFailWithEmptyDescriptionField(): void
    {        
        $this->expectExceptionMessage("The description field cannot be empty");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => '',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);                                
    }

    public function testFailWithEmptyCreatedAtField(): void
    {        
        $this->expectException(\TypeError::class);            
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);

        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => '',
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);
    }

    public function testFailWithEmptyUpdatedAtField(): void
    {        
        $this->expectException(\TypeError::class);            
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => '',
        ];
        $product = new Product($attrs);
    }

    public function testFailWithLargeNameField(): void
    {
        $this->expectExceptionMessage("The name field cannot be greather than 100 characters");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);        
    }

    public function testFailWithLargeDescriptionField(): void
    {
        
        $this->expectExceptionMessage("The description field cannot be greather than 500 characters");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Product Test',                
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris. Lorem ipsum dolor sit amet, consectetur adipiscing elit. Mauris libero nibh, sagittis vitae lacus blandit, dictum efficitur mauris.',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);
        
    }

    public function testFailWithCreatedAtFieldInThePast(): void
    {
        $this->expectExceptionMessage("The createdAt field cannot be in the past");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,
            'createdAt' => new DateTime('1970-01-01 00:00:00'),
            'updatedAt' => new DateTime(),
        ];
        $product = new Product($attrs);
    }

    public function testFailWithUpdatedAtFieldInThePast(): void
    {
        $this->expectExceptionMessage("The updatedAt field cannot be in the past");
        $buyer = new Buyer([
            'name' => 'Adam A. de Lima',
            'document' => '145674564d56a6dasda',
            'active' => true,
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime(),
        ]);
        $attrs = [
            'buyer' => $buyer,
            'name' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'description' => 'Lorem ipsum dolor sit amet, consectetur adipiscing elit.',
            'active' => true,                
            'createdAt' => new DateTime(),
            'updatedAt' => new DateTime('1970-01-01 00:00:00'),
        ];
        $product = new Product($attrs);
    }
}
