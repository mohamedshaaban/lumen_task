<?php

namespace App\Http\Controllers\Api;
use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\collections;
use App\order;
use App\order_items;
use App\order_items_tags;
use Storage;

class OrderController extends Controller
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
    public function order(Request $request)
    {
        $url = 'https://developer.github.com/v3/#http-redirects';
        
        $con = file_get_contents($url);
        $num_of_repeat =  substr_count($con, 'status');
        $discount_amount = 0 ;
        foreach ($request->order['items'] as $item)
        {
            
            $collection = collections::where('id',$item['collection_id'])->first();
            if($collection->has_discount == 1 )
            {
               
                $discount_amount+= $item['value']-(($item['value']*$collection->discount)/100);
                
            }
        }
        /*check disacount amount if > 25% */
        $check_discount_amount = $request->order['total_amount_net']-(($request->order['total_amount_net']*25)/100);
        if($discount_amount<$check_discount_amount && $discount_amount!=0)
        {
            $discount_amount = $check_discount_amount;
        }
        
        
         return response()->json([
             'total_amount_net'=>$request->order['total_amount_net'],
             'shipping_costs'=>$request->order['shipping_costs'],
             'discount_Amount'=>$discount_amount,
                
            ]);
    }

    //
}
