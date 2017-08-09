<?php

use PHPUnit\Framework\TestCase;

class ProductGrouperTest extends TestCase
{
	/**
	* @expectedException     Exception
	*/
	public function testInvalidProductException()
	{
		$productGrouper = new ProductGrouper();
		$products[] = "string";
		$productGrouper->group($products);
	}

	public function testSorted()
	{
		$productGrouper = new ProductGrouper();
		$products[] = new Product("B", "2");
		$products[] = new Product("B", "1");
		$products[] = new Product("A", "2");
		$products[] = new Product("A", "1");

		$grouped = $productGrouper->group($products);

		$this->assertEquals($grouped[0]->brand, "A");
		$this->assertEquals($grouped[0]->type, "1");
		$this->assertEquals($grouped[1]->brand, "A");
		$this->assertEquals($grouped[1]->type, "2");
		$this->assertEquals($grouped[2]->brand, "B");
		$this->assertEquals($grouped[2]->type, "1");
		$this->assertEquals($grouped[3]->brand, "B");
		$this->assertEquals($grouped[3]->type, "2");
	}
}