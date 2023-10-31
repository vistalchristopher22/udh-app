<?php

use App\Enums\AccessType;
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
        Schema::create('documents', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->foreignIdFor(Office::class, 'office_responsible');
            $table->enum('access_level', AccessType::all());
            $table->enum('status', ['active', 'archived', 'deprecated']);
            $table->json('coordinates')->nullable();
            $table->foreignIdFor(Employee::class, 'uploaded_by');
            $table->unsignedBigInteger('category_id')->nullable();
            $table->foreign('category_id')->references('id')->on('categories')->onDelete('set null');
            $table->timestamp('uploaded_at');
            $table->text('file_path');
            $table->text('file_content');
            $table->string('file_type');
            $table->integer('size');
            $table->string('version');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('documents');
    }
};
