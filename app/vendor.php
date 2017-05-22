<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class vendor extends Model
{
    protected $table = 'vendors';
    protected $fillable = [
'id',
'name',
'cantactperson',
'phone',
'address',
'bankname',
'bankaccout',
'remark',
    ];
}
