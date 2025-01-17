<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    protected $fillable = ['customer_name', 'customer_email', 'status', 'total_price'];
    
    public function orderItems()
    {
        return $this->hasMany(OrderItem::class);
    }
}
