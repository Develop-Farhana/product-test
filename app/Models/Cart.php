<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;

    protected $fillable = [
        'product_id', // ✅ Added for mass assignment
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }
}
