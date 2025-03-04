<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasOne;
class Products extends Model
{
    use HasFactory;

    public function customers()
    {
        return $this->BelongsTo(Customers::class,'customer_id');
    }
    public function CarPlanProducts()
    {
        return $this->hasMany(CarPlanProducts::class, 'product_id');
    }
}
