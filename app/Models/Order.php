<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'total_price',
        'status',
        ];

    // Связь с User (принадлежит пользователю)
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // Связь с OrderItem (один ко многим)
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
