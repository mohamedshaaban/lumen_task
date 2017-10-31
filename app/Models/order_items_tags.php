<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_items_tags extends Model
{
     protected $table = 'order_items_tags';
    protected $fillable = ['title','order_item_id'];

     public function order_items_tags(){
        return $this->belongsTo(order_items_tags::class,'order_item_id','id');
    }
}
