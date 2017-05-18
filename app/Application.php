<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Application extends Model
{
    //
    protected $table = 'applications';
    protected $fillable = [
        'u_id',
        'm_id',
        'problem',
        'date'
    ];


    public function asset()
    {
        return $this->belongsTo(Asset::class);
    }

}
