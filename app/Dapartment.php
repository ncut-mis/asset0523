<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Dapartment extends Model
{
    //
    protected $table = 'departments';
    protected $fillable = [
        'name',
        'supervisor',
    ];
}
