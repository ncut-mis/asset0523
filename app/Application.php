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

    public function Maintaince() // Application (n) -> Maintaince (1)
    {
        return $this->belongsTo(Maintaince::class);
    }

}
