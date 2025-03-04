<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Carplans extends Model
{
    use HasFactory;
    public function driver1(): BelongsTo
    {
        return $this->BelongsTo(Employees::class,'driver1_id');//อ้างอิงไปตาราง Employees one to one และหาFK  คนขับ1
    }
    public function allowance1(): BelongsTo
    {
        return $this->BelongsTo(Allowances::class,'allowance1_id');//อ้างอิงไปตาราง Employees one to one และหาFK  เบี้ยเลี้ยง1
    }
    public function driver2(): BelongsTo
    {
        return $this->BelongsTo(Employees::class,'driver2_id');//อ้างอิงไปตาราง Employees one to one และหาFK  คนขับ2
    }
    public function allowance2(): BelongsTo
    {
        return $this->BelongsTo(Allowances::class,'allowance2_id');//อ้างอิงไปตาราง Employees one to one และหาFK  เบี้ยเลี้ยง2
    }
    public function driverassistants(): BelongsTo
    {
        return $this->BelongsTo(Employees::class,'assistant_driver_id');//อ้างอิงไปตาราง Employees one to one และหาFK  คนขับ2
    }
    public function assistantsallowance2(): BelongsTo
    {
        return $this->BelongsTo(Allowances::class,'assistant_allowance_id');//อ้างอิงไปตาราง Employees one to one และหาFK  เบี้ยเลี้ยง2
    }
    public function customers(): BelongsTo
    {
        return $this->BelongsTo(Customers::class,'customer_id');//อ้างอิงไปตาราง Customers one to one และหาFK 
    }
    public function roads(): BelongsTo
    {
        return $this->BelongsTo(Roads::class,'road_id');//อ้างอิงไปตาราง Roads one to one และหาFK 
    }
    public function cars(): BelongsTo
    {
        return $this->BelongsTo(Cars::class,'car_id');//อ้างอิงไปตาราง Roads one to one และหาFK 
    }
    public function CarPlanProducts(): HasMany
    {
        return $this->hasMany(CarPlanProduct::class,'carplan_id');
    }

    public function Additionalcosts(): HasMany
    {
        return $this->hasMany(Additionalcosts::class,'carplan_id');
    }
}
