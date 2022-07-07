<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Routing\Controller;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Crypt;

class MenuController extends Controller
{

    public function __construct()
    {
        $this->middleware(['auth:admin','admin:admin']);
    }

    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $items = DB::table('menus')->get();
        return view('admin.menu.index', ['items' => $items]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        // go to insert page
        return view('admin.menu.insert');
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {   $isExist = DB::table('menus')->where('menu_id', $request->menu_id)->first();
        
        if ($isExist) {
            return redirect('/add')->with('add_status', 'Error | Duplicate \'menu_id\' found.');
        } else {
            DB::table('menus')->insert([
                'menu_id' => $request->menu_id,
                'name' => $request->item_name,
                'category' => $request->category,
                'price' => $request->price,
                'options' => $request->options,
                'rating' => $request->rating,
                'description' => $request->description,
                'poster' => $request->poster
            ]);

            return redirect('/add')->with('add_status', 'Item has been added successfully.');
        }
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $menu = DB::table('menus')->where('id', $id)->first();
        return view('admin.menu.show', compact('menu'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        $menu = DB::table('menus')->where('id', $id)->first();
        return view('admin.menu.edit', compact('menu'));
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
        DB::table('menus')->where('id', $id)
        ->update([
            'id' => $request->id,
            'menu_id' => $request->menu_id,
            'name' => $request->item_name,
            'category' => $request->category,
            'price' => $request->price,
            'options' => $request->options,
            'rating' => $request->rating,
            'description' => $request->description,
            'poster' => $request->poster
        ]);
        
        return redirect('/admin')->with('data_status', 'An item has been updated.');

    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        DB::table('menus')->where('id', $id)->delete();
        return redirect('/admin')->with('data_status', 'An item has been deleted.');
    }
    public function history()
    {
        $items = DB::table('invoices')->get();
        return view('admin.menu.history', ['items' => $items]);
    }
    public function edithistory(Request $request, $id)
    {
        DB::table('invoices')->where('id', $id)->update(['status' => $request->status]);
        return redirect('/admin/history')->with('data_status', 'An item has been updated.');

    }
}
