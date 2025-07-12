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
        Schema::create('server_stats', function (Blueprint $table) {
            $table->id();
            $table->string('hostname');
            $table->decimal('cpu_usage', 5, 2);
            $table->decimal('memory_usage', 5, 2);
            $table->decimal('disk_usage', 5, 2);
            $table->string('uptime')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('server_stats');
    }
};
