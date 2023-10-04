<?php

use App\Models\Document;
use App\Models\Employee;
use App\Models\Office;
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
        Schema::create('service_processes', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Document::class)->onDelete('cascade');
            $table->foreignIdFor(Office::class)->onDelete('cascade');
            $table->text('description');
            $table->unsignedBigInteger('estimated_days_to_process');
            $table->unsignedBigInteger('estimated_duration_hours');
            $table->unsignedBigInteger('estimated_duration_minutes');
            $table->foreignIdFor(Employee::class, 'look_for')->onDelete('cascade');
            $table->foreignIdFor(Employee::class, 'secretary')->onDelete('cascade');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('service_processes');
    }
};
