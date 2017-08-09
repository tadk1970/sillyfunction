<?php

/**
* A simple class that represents a product
*/
class Product
{
	public $brand;
	public $type;

	/**
	* Constructor for product
	*
	* @param string $brand
	* @param string $type
	*/
	public function __construct(string $brand, string $type)
	{
		$this->brand = $brand;
		$this->type = $type;
	}
}

/**
* A class that is used to group an array of products
*/
class ProductGrouper
{
	/**
	* Method that groups an array of prodducts
	*
	* Method will sort the array of products by brand and by type within brand order
	*
	* @param array $products
	*
	* @return array the array of sorted products
	*/
	public function group(array $products): array
	{
		$brandTypes = [];
		$groupedProducts = [];

		foreach ($products as $product) {
			if (!$product instanceof Product) {
				throw new Exception("ProductGrouper.group() requires and array of Products");
			}

			if (!isset($product->brand)) {
				$product->brand = '';
			}

			$brandTypes[$product->brand][] = $product->type;
		}

		foreach ($brandTypes as $brand => $types) {
			sort($types);
			$brandTypes[$brand] = $types;
		}

		ksort($brandTypes);

		foreach ($brandTypes as $brand => $types) {
			foreach($types as $type) {
				$groupedProducts[] = new Product($brand, $type);
			}
		}

		return $groupedProducts;
	}
}
