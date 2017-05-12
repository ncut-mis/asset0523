<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Supply extends Model
{
    //
    protected $table = 'supplies';
    protected $fillable = [
        'name',
        'quantity',
    ];
    /*
    public function scopeOfName($query,$type)
    {
        return $query->where('name','*like*','%'.$type.'%');
    }
    */


}
