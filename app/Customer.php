<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class
Customer extends Model
{


    public function Company(){
        return $this->belongsToMany(Company::class,'customers_companies')->withTimestamps();

    }    public function Product(){
        return $this->belongsToMany(Product::class,'customers_products')->withTimestamps();

    }


    protected $guarded =[];
//    protected $attributes = [
//        'active' => 1
//        'active' => 1
//    ];
}
