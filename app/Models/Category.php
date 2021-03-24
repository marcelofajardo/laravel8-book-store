<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Category extends Model 
{

    protected $table = 'categories';
    
    public $timestamps = true;

    /**
     * Relationship: One to many
     */
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}