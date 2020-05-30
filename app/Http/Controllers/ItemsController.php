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
    public function destroy(Request $request, $id)
    {
        if (!Session::has('admin-authenticated') || Session::get('admin-authenticated') !== true) {
            return false;
        }

        $item = Item::findOrFail($id);

        $item->delete();

        return redirect()->route('admin.index');
        
    }
}
