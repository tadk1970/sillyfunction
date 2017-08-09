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
