<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Salarys extends Model
{
    use HasFactory;
    public function eventsalerys(): HasMany
    {
        return $this->HasMany(Eventsalerys::class,'employee_id');//อ้างอิงไปตาราง Accountnumbers one to many และหาFK 
    }
}
