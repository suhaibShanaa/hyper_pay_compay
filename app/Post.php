<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\App;

class Post extends Model
{
    //

    protected $guarded=[];

    public function user(){
        return $this->belongsTo(User::class);
    }

}
