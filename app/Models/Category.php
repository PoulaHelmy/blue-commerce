<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    protected $fillable = ['name', 'slug'];
    protected $hidden = ['created_at', 'updated_at'];

    public function brands()
    {
        return $this->belongsToMany('App\Models\Brand', 'category_brand', 'category_id', 'brand_id');
    }


}
