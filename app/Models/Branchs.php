<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Branchs extends Model
{
    use HasFactory;
    public function customers()
    {
        return $this->BelongsTo(Customers::class,'customer_id');
    }
    public function sectors()
    {
        return $this->BelongsTo(Sectors::class,'sector_id');
    }
}
