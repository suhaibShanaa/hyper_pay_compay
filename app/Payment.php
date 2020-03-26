<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class Payment extends Model
{
    //
    protected $table = 'payments';
    protected $guarded=[];
}
