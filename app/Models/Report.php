<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Report extends Model
{
    use HasFactory;

    public const STATUS_SELECT = [
        '1' => 'Returned',
        '2' => 'Rented Out',
    ];

    protected $fillable = [
        'item',
        'sku',
        'status',
        'person',
        'created_at',
        'updated_at',
        'deleted_at',
    ];
}
