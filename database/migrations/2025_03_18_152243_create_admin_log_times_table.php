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
        Schema::create('admin_log_times', function (Blueprint $table) {
            $table->id();

            $table->foreignId('user_id')->constrained('admins')->onDelete('cascade');
            $table->timestamp('login_time');
            $table->timestamp('logout_time')->nullable();
            $table->text('description')->nullable();

            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('admin_log_times');
    }
};
