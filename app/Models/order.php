<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order extends Model
{
     protected $table = 'order';
    protected $fillable = ['order_id','email','total_amount_net' , 'shipping_costs' , 'payment_method'];

     public function order_items(){
        return $this->hasMany(order_items::class,'order_id','id');
    }
 
}
