<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductDetail extends Model
{      
    use HasFactory;

    public const STATUS_SELECT = [
        '1' => 'Available',
        '2' => 'Maintenance',
        '3' => 'Rented Out',
    ];

     protected $fillable = [
        'sku',
        'status',
        'stock',
        'stock_location',
        'product_id',
        'created_at',
        'updated_at',
        'deleted_at',
    ];

    public function product()
    {
        return $this->belongsTo(Product::class, 'product_id', 'id');
    }
}
