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
        Schema::create('leaderboard_participants', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('profile_url')->unique();
            $table->string('profile_token')->nullable();
            $table->integer('arcade_count')->default(0);
            $table->integer('skill_count')->default(0);
            $table->float('bonus_points')->default(0);
            $table->float('total_points')->default(0);
            $table->string('milestone_reached')->default('None');
            $table->timestamp('last_checked_at')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('leaderboard_participants');
    }
};
