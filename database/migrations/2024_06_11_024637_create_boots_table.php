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
        Schema::create('boot', function (Blueprint $table) {
            $table->id();
            $table->string('boot');
            $table->foreignId('user_id');
            $table->enum('status', ['accept', 'notAccept'])->default('notAccept');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('boots');
    }
};
