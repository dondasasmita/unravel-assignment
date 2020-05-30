<?php

namespace App\Http\Controllers;

use App\Item;
use Illuminate\Http\Request;
use Session;
use App\Cart;

class ItemsController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        //
    }

     /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        
        //TODO validate
        Item::create($request->all());

        return redirect()->route('admin.index');

    }

    public function addNewItem()
    {
        //TODO check if admin
        return view('admin.item.new');
    }

    public function addToCart(Request $request, $id)
    {
        $item = Item::find($id);
        
        $existing_cart = Session::has('cart') ? Session::get('cart') : null;

        $cart = new Cart($existing_cart);
        $cart->add($item, $item->id);

        $request->session()->put('cart', $cart);

        return redirect()->route('home');
    }

    public function getCart()
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

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        
    }

   

    /**
     * Display the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //ToDo validate
        
        $item = Item::find($id);

        return view('admin.item.edit', ['item' => $item]);

    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function edit(Request $request, $id)
    {

        // To Validate only admin can edit

        $data = $request->except(['_token','_method']);

        // Todo validate
        Item::where('id', $id)->update($data);

       $items = Item::all();

        return view('admin.index', ['items' => $items]);
        
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, Item $item)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  \App\Item  $item
     * @return \Illuminate\Http\Response
     */
    public function destroy(Item $item)
    {
        //
    }
}
