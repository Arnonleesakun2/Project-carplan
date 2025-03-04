<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class Meetings extends Model
{
    use HasFactory;
    public function employees(): BelongsToMany
    {
        return $this->belongsToMany(Employees::class,'meeting_id');//อ้างอิงไปตาราง employees many to many และหาFK 
    }
}
