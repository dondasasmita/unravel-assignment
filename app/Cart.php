<?php 

namespace App;

class Cart {

	public $chosen_items = array();
	public $total_qty = 0;
	public $total_price = 0;


	public function __construct($existing_cart)
	{
		if ($existing_cart) {

			$this->chosen_items = $existing_cart->chosen_items;
			$this->total_qty = $existing_cart->total_qty;
			$this->total_price = $existing_cart->total_price;

		}
	}

	public function add($item, $id)
	{
		$stored_item = ['qty' => 0, 'price' => $item->price, 'item' => $item];

		if ($this->chosen_items) {

			if (array_key_exists($id, $this->chosen_items)) {
				$stored_item = $this->chosen_items[$id];
			}
		}

		$stored_item['qty']++;
		$stored_item['price'] = $item->price * $stored_item['qty'];

		$this->chosen_items[$id] = $stored_item;
		$this->total_qty++;
		$this->total_price += $item->price;

	}









}
