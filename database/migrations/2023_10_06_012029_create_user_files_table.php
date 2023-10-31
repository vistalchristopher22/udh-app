<?php

use App\Models\Employee;
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
        Schema::create('user_files', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->text('description');
            $table->timestamp('uploaded_at');
            $table->text('file_path');
            $table->text('file_content')->nullable();
            $table->string('file_type');
            $table->integer('size');
            $table->string('version');
            $table->string('thumbnail');
            $table->enum('status', ['active', 'archived', 'deprecated']);
            $table->foreignIdFor(Employee::class, 'uploaded_by');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('user_files');
    }
};
