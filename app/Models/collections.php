<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class collections extends Model
{
     protected $table = 'collections';
    protected $fillable = ['title'];
    
        public function order_items(){
        return $this->hasMany(order_items::class,'collection_id','id');
            
    }

}
