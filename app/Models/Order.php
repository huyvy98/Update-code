<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

/**
 * @property int $user_id
 * @property boolean $status
 */
class Order extends Model
{
    use HasFactory;

    protected $table = 'orders';

    public function orderDetails(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, OrderDetail::class, 'product_id', 'order_id');
    }

    public function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
