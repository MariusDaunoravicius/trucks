<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    public function up(): void
    {
        Schema::create('truck_subunits', function (Blueprint $table) {
            $table->id();
            $table->unsignedInteger('main_truck_id')->index();
            $table->unsignedInteger('subunit_truck_id')->index();
            $table->date('start_date')->index();
            $table->date('end_date')->index();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('truck_subunits');
    }
};
