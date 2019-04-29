<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Http\Response;
use App\Store;

class StoreController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {

    }

    /**
     * Display all the resources for API.
     *
     * @return \Illuminate\Http\Response
     */
    public function getAllApi(Request $request)
    {
        $stores = Store::whereNull('deleted_at')->get();
        return response()->json(['stores' =>$stores, 'success'=> true, 'total_elements'=> count($stores)]);
    }

    public function destroy($id)
    {
        $store = Store::find($id);
        $store->delete();
        return response()->json(['store' =>'Store successfully deleted!', 'success'=> true]);
    }

    public function store(Request $request)
    {
        $store = new Store;
        $store->name = $request->name;
        $store->address = $request->address;
        
        $store->save();
        return response()->json(['message' => 'Store created successfully!', 'success'=> true]);
    }

    public function update(Request $request, $id){
        $store = Store::find($id);

        $store->name = $request->name;
        $store->address = $request->address;

        $store->save();
        return response()->json(['store' => $store, 'message' => 'Store updated successfully!', 'success'=> true]);
    }
}
