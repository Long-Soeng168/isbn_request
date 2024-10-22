<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BookCategory extends Model
{
    use HasFactory;

    protected $guarded = [];
    protected $table = 'categories';



    public function subCategories()
    {
        return $this->hasMany(BookSubCategory::class);
    }
}
