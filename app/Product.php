<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['name','image','category'];

    public function Customer(){
        return $this->belongsToMany(Customer::class,'customers_products')->withTimestamps();
    }

//    public function Company()
//    {
//        return $this->belongsTo(Company::class);
//    }
}
