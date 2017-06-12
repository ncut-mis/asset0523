<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Asset extends Model
{
    //資產
    protected $table = 'assets';
    protected $fillable = [
        'name',
        'category',
        'date',
        'cost',
        'status',
        'keeper',
        'lendable',
        'location',
        'remark',
        'vendor',
        'warranty'
    ];

    public function categories() //  Asset (1) -> Category (n)
    {
        return $this->hasMany(Category::class);
    }

    public function maintainces() //  Asset (1) -> Maintaince (n)
    {
        return $this->hasMany(Maintaince::class);
    }


    public function user() // Asset (n) ->User (1)
    {
        return $this->belongsTo(User::class);
    }
}
