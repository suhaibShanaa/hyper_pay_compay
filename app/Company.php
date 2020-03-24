<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    //
    protected $table = "companies";
    protected $guarded = [];
    public function Customer(){
        return $this->belongsToMany(Customer::class,'customers_companies')->withTimestamps();
    }
    public function Product(){
        return $this->hasMany(Product::class,'company_id','id');
    }
}
