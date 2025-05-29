<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use function Laravel\Prompts\table;

class Category extends Model
{
    protected $table = 'categories';

    public function products()
    {
        return $this->hasMany(Product::class);
    }


    use HasFactory;
}
