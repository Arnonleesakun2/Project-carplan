<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('carplans', function (Blueprint $table) {
            $table->id();
            $table->date('date');
            $table->string('temperature')->nullable();
            $table->string('routetype'); 
            $table->string('tatolweight')->nullable(); 
            $table->string('tatolweightbasket')->nullable(); 

            $table->string('customer_id');
            $table->string('road_id');
            $table->string('driver1_id')->nullable();
            $table->string('allowance1_id')->nullable();
            $table->string('driver2_id')->nullable();
            $table->string('allowance2_id')->nullable();
            $table->string('assistant_driver_id')->nullable();
            $table->string('assistant_allowance_id')->nullable();
            $table->string('car_id');
            $table->string('status',10)->default(1);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('carplans');
    }
};
