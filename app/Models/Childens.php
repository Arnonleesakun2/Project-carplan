<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Childens extends Model
{
    use HasFactory;
    public function employee(): BelongsTo
    {
        return $this->belongsTo(Employees::class,'employee_id');
    }
}
