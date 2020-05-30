<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Session;
use App\Item;

class AdminController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

        $is_authenticated = Session::get('admin-authenticated');
        
        if (!Session::has('admin-authenticated') || !$is_authenticated) {
            return view('admin.login');
        }

        $items = Item::all();

        return view('admin.index', ['items' => $items]);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function login(Request $request)
    {
        // @TODO Intergrate Google Oauth2 Signin
        $email = 'test@unravel.com';

        $domain = explode('@', $email)[1];

        if ($domain !== 'unravel.com') {
            return false;
        }

        $request->session()->put('admin-authenticated', true);

        $items = Item::all();

        return redirect()->route('admin.index', ['items' => $items]);
    }


    public function logout(Request $request)
    {

        $request->session()->forget('admin-authenticated');

        return view('admin.login');

    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
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
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
