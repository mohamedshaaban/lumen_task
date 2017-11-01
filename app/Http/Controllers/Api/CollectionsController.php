<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\collections;
use App\order;
use App\order_items;
use App\order_items_tags;
use Storage;

class CollectionsController extends Controller
{
    /**
     * Create a new controller instance.
     *
     * @return void
     */
    public function __construct()
    {
        //
    }
    public function create(Request $request)
    {
        $collection = new collections();
        
        $collection->title = $request->collection['title'];
        $collection->has_discount = $request->collection['has_discount'];
        $collection->discount = $request->collection['discount'];
        
        $collection_id = $collection->save();
        return response()->json([
             'collections'=>collections::all(),
            
            ]);

    }

    //
}
