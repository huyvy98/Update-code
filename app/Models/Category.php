<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Notifications\Notifiable;

class Category extends Model
{
    use HasFactory;
    use Notifiable;

    protected $table = 'categories';

    public function products()
    {
        return $this->belongsToMany(Product::class,'category_product', 'category_id','product_id');
    }
}
