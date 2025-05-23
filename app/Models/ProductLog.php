<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductLog extends Model
{
    use HasFactory;

    protected $casts = [
        'changes' => 'array',
        'created_at' => 'datetime',
    ];

    protected $fillable = [
        'product_id',
        'action',
        'changed_by',
        'changes'
    ];

    public function product()
    {
        return $this->belongsTo(Product::class);
    }

    public function changer()
    {
        return $this->belongsTo(User::class, 'changed_by');
    }
}
