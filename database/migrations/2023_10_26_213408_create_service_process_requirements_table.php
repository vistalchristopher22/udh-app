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
        Schema::create('service_process_requirements', function (Blueprint $table) {
            $table->id();
            $table->unsignedBigInteger('service_process_id');
            $table->text('description');
            $table->foreign('service_process_id')->references('id')->on('service_processes')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_process_requirements');
    }
};
