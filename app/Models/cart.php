<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class cart extends Model
{
    protected $fillable = [
        'item_count',
        'sub_total',
        'total_discount',
        'total_tax',
        'total',
        'is_paid',
    ];

    protected function user(): BelongsTo
    {
        return $this->belongsTo(User::class);
    }
}
