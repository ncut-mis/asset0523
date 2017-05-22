<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Receive extends Model
{
    //
    protected $table = 'receives';
    protected $fillable = [
        'u_id',
's_id',
'datatime'.
'quantity',
    ];
    public function user()
{
    return $this->hasMany(User::class);
}
    public function supply()
    {
        return $this->hasMany(Supply::class);
    }
}


