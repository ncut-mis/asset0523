<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Maintaince extends Model
{
    //
    protected $table = 'maintainces';
    protected $fillable = [
        'a_id',
        'v_id',
        'date',
        'status',
        'method',
        'remark'
    ];


    public function asset() // Maintaince (n) -> asset (1)
    {
        return $this->belongsTo(Asset::class);
    }

    public function applications() //  Maintaince (1) -> Application (n)
    {
        return $this->hasMany(Application::class);
    }




}
