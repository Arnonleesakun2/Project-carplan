<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Relations\HasOne;

class Employees extends Model
{
    use HasFactory;
    public function prefixs(): BelongsTo
    {
        return $this->BelongsTo(Prefixs::class,'prefix_id');//อ้างอิงไปตาราง prefixs one to one และหาFK 
    }
    public function acquaintances(): HasMany
    {
        return $this->HasMany(Acquaintances::class,'employee_id');//อ้างอิงไปตาราง acquaintances one to many และหาFK 
    }
    public function nationalitys(): BelongsTo
    {
        return $this->BelongsTo(Nationalitys::class,'nationlity_id');//อ้างอิงไปตาราง nationalitys one to one และหาFK 
    }
    public function races(): BelongsTo
    {
        return $this->BelongsTo(Races::class,'race_id');//อ้างอิงไปตาราง races one to one และหาFK 
    }
    public function religions(): BelongsTo
    {
        return $this->BelongsTo(Religions::class,'religion_id');//อ้างอิงไปตาราง religions one to one และหาFK 
    }
    public function psts(): BelongsTo
    {
        return $this->BelongsTo(Psts::class,'psts_id');//อ้างอิงไปตาราง psts one to one และหาFK 
    }
    public function childens(): HasMany
    {
        return $this->HasMany(Childens::class,'employee_id');//อ้างอิงไปตาราง childens one to many และหาFK 
    }
    public function typemilitarys(): BelongsTo
    {
        return $this->BelongsTo(Typemilitarys::class,'typemilitary_id');//อ้างอิงไปตาราง typemilitarys one to one และหาFK 
    }
    public function militarys(): HasMany
    {
        return $this->HasMany(Militarys::class,'employee_id');//อ้างอิงไปตาราง militarys one to many และหาFK 
    }
    public function divingcards(): BelongsTo
    {
        return $this->BelongsTo(Divingcards::class,'divingcard_id');//อ้างอิงไปตาราง divingcards one to one และหาFK 
    }
    public function cartypes(): BelongsTo
    {
        return $this->BelongsTo(Cartypes::class,'cartype_id');//อ้างอิงไปตาราง cartypes one to one และหาFK 
    }
    public function agedivingcards(): HasMany
    {
        return $this->HasMany(AgeDivingcards::class,'employee_id');//อ้างอิงไปตาราง agedivingcard one to many และหาFK 
    }
    public function jopps(): HasMany
    {
        return $this->HasMany(Jopps::class,'employee_id');//อ้างอิงไปตาราง jopps one to many และหาFK 
    }
    public function positions(): BelongsTo
    {
        return $this->BelongsTo(Positions::class,'position_id');//อ้างอิงไปตาราง positons one to one และหาFK 
    }
    public function cases(): HasMany
    {
        return $this->HasMany(Cases::class,'employee_id');//อ้างอิงไปตาราง cases one to many และหาFK 
    }
    public function vaccines(): HasMany
    {
        return $this->HasMany(Vaccines::class,'employee_id');//อ้างอิงไปตาราง vaccines one to many และหาFK 
    }
    public function diseases(): HasMany
    {
        return $this->HasMany(Diseases::class,'employee_id');//อ้างอิงไปตาราง diseases one to many และหาFK 
    }
    public function addicteds(): HasMany
    {
        return $this->HasMany(Addicteds::class,'employee_id');//อ้างอิงไปตาราง addicteds one to many และหาFK 
    }
    public function typeeducations(): BelongsTo
    {
        return $this->BelongsTo(TypeEducations::class,'tyepeducation_id');//อ้างอิงไปตาราง typeeducation one to one และหาFK 
    }
    public function educations(): HasMany
    {
        return $this->HasMany(Educations::class,'employee_id');//อ้างอิงไปตาราง addicteds one to many และหาFK 
    }

    public function mainlines(): BelongsTo
    {
        return $this->BelongsTo(Maimlines::class,'mainline_id');//อ้างอิงไปตาราง Maimlines one to one และหาFK 
    }

    public function accountnumbers(): HasMany
    {
        return $this->HasMany(Accountnumbers::class,'employee_id');//อ้างอิงไปตาราง Accountnumbers one to many และหาFK 
    }

    public function salarys(): HasMany
    {
        return $this->HasMany(Salarys::class,'employee_id');//อ้างอิงไปตาราง Accountnumbers one to many และหาFK 
    }

    public function companys(): BelongsTo
    {
        return $this->BelongsTo(Companys::class,'company_id');//อ้างอิงไปตาราง Maimlines one to one และหาFK 
    }

    public function reportsalarys(): HasMany
    {
        return $this->HasMany(Reportsalarys::class,'employee_id');//อ้างอิงไปตาราง Eventsalarys one to many และหาFK 
    }

    public function meetings(): BelongsToMany
    {
        return $this->belongsToMany(Meetings::class,'employee_id');//อ้างอิงไปตาราง Meetings many to many และหาFK 
    }

    public function outsts(): BelongsTo
    {
        return $this->BelongsTo(Outsts::class,'outsts_id');//อ้างอิงไปตาราง Maimlines one to one และหาFK 
    }
    public function User()
    {
        return $this->HasOne(User::class, 'employee_id');
    }
}   
  