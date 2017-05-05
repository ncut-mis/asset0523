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
        'warranty',
    ];

    public function category()
    {
        return $this->hasMany(Category::class);
    }

}
