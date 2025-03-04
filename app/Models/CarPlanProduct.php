<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class CarPlanProduct extends Model
{
    use HasFactory;
    public function Carplans(): BelongsTo
    {
        return $this->belongsTo(Carplans::class);
    }

    public function Products(): BelongsTo
    {
        return $this->belongsTo(Products::class, 'product_id');
    }
    public function Branchs(): BelongsTo
    {
        return $this->belongsTo(Branchs::class, 'branch_id');
    }
}
