<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    //
    protected $table = 'Categories';
    protected $fillable = [
        'name'
    ];

    public function asset() // Category (n) -> Asset (1)
    {
        return $this->belongsTo(Asset::class);
    }

}
