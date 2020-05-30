<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Cart as Cart;
use App\Item;
use Auth;


class CartController extends Controller
{
	/**
	 * [add description]
	 * @param Request $request [description]
	 * @param [type]  $id      [description]
	 */
	public function add(Request $request, $id)
	{
		$item = Item::find($id);

		$existing_cart = Session::has('cart') ? Session::get('cart') : null;

		$cart = new Cart($existing_cart);
		$cart->add($item, $item->id);

		$request->session()->put('cart', $cart);

		return redirect()->route('home');
	}

	/**
	 * [show description]
	 * @return [type] [description]
	 */
	public function show()
	{
		if (!Session::has('cart')) {
			return view('shop.cart', ['products' => null]);
		}

		$existing_cart = Session::get('cart');

		$cart = new Cart($existing_cart);


		return view('shop.cart', [
			'products' => $cart->chosen_items,
			'total_price' => $cart->total_price
		]);
	}

	/**
	 * [checkout description]
	 * @return [type] [description]
	 */
	public function checkout()
	{
		if (!Session::has('cart')) {
			return redirect()->route('home');
		}

		$existing_cart = Session::get('cart');

		$cart = new Cart($existing_cart);

		$total = $cart->total_price;

		return view('shop.checkout', ['total' => $total]);
	}

	public function clear(Request $request)
	{

		if (!Session::has('cart')) {
			return redirect()->route('home');
		}

		$request->session()->forget('cart');

		return redirect()->route('home');

	}

	public function pay(Request $request)
	{
		$amount_to_charge = (float)$request->input('total');

		$token = $request->input('stripeToken');

		\Stripe\Stripe::setApiKey('sk_test_8xxcMFYiQqqsT3iGL1s7SDsi');

		try {

			$charge = \Stripe\Charge::create(
				array(
					'amount' =>  $amount_to_charge * 100,
					'currency' => 'sgd',
					'source' => $token
				)
			);

		} catch (Exception $e) {

			// TODO handle error send message to user view
			dd($e->getMessage());
		}


		$user_id = Auth::user()->id;
		$transaction_id = $charge->id;
		$amount_paid = $charge->amount / 100; // to dollars

		// TODO: Create Transaction Record
	}
}
