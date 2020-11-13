<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    protected $fillable = ['name', 'slug', 'ske', 'image', 'brand_id'];
    protected $appends = ['image_path'];

    public function brands()
    {
        return $this->belongsTo('App\Models\Brand', 'brand_id');
    }

    public function getImagePathAttribute()
    {
        return asset('uploads/product_images/' . $this->image);

    }//end of get image path
}
