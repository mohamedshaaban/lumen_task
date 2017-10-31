<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class order_items extends Model
{
     protected $table = 'order_items';
    protected $fillable = ['name','qnt','value' , 'category' , 'subcategory', 'collection_id' , 'order_id'];
 
        public function order_items_tags(){
        return $this->hasMany(order_items_tags::class,'order_item_id','id');
    }
 
        public function order(){
        return $this->belongsTo(order::class,'order_id','id');
    }
        public function collection(){
        return $this->belongsTo(collection::class,'collection_id','id');
    }
}
