<?php

class Product
{
	public $brand;
	public $type;

	public function __construct(string $brand, string $type)
	{
		$this->brand = $brand;
		$this->type = $type;
	}
}

$product = new Product("hello", "world");

echo $product->brand;
echo $product->type;