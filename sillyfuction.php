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

class ProductGrouper
{
	public $products = [];

	public function group(Array $products)
	{
		$brandTypes = [];

		foreach ($products as $product) {
			if (!$product instanceof Product) {
				throw new Exception("ProductGrouper.group() requires and array of Products");
			}

			if (!isset($product->brand)) {
				$product->brand = ''

			$brandTypes[$product->brand] = [$product->type = 1];
		}
	}
}

$product = new Product("hello", "world");

echo $product->brand;
echo $product->type;

$products[] = $product;

$productGrouper = new ProductGrouper($products);