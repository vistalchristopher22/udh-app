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
        Schema::table('user_files', function (Blueprint $table) {
            $table->unsignedBigInteger('folder_id')->nullable()->after('id'); // 'after' is optional, just for aesthetics
            $table->foreign('folder_id')->references('id')->on('folders')->onDelete('set null');
            $table->softDeletes();
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
