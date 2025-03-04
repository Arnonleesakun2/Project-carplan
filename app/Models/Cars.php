<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Cars extends Model
{
    use HasFactory;
    public function cartypes(): BelongsTo
    {
        return $this->BelongsTo(Cartypes::class,'cartype_id');//อ้างอิงไปตาราง Cartypes one to one และหาFK 
    }
}
