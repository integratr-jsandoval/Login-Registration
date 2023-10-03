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
        Schema::create('admin_profiles', function (Blueprint $table) {
            $table->uuid('id')->primary();
            $table->string('email')->nullable();
            $table->timestamps();
            $table->index(['id', 'email', 'created_at', 'updated_at']);
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_profiles');
    }
};
