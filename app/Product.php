<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    //
    protected $fillable=['name','image','category','company_id'];


    public function Company()
    {
        return $this->belongsTo(Company::class);
    }
}
