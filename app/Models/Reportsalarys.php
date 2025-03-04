<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Reportsalarys extends Model
{
    use HasFactory;
    public function employees(): BelongsTo
    {
        return $this->BelongsTo(Employees::class,'employee_id');//อ้างอิงไปตาราง Maimlines one to one และหาFK 
    }
}
