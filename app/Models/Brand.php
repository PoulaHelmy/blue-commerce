<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $hidden = ['created_at', 'updated_at'];

    public function categories()
    {
        return $this->belongsToMany('App\Models\Category', 'category_brand', 'brand_id', 'category_id');
    }
}
