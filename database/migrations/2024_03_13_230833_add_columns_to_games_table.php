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
        Schema::table('games', function (Blueprint $table) {
            $table->enum('status', \App\Enums\GameStatusEnum::values())->default(\App\Enums\GameStatusEnum::PLANNED)->after('away_id');
            $table->smallInteger('round')->nullable()->after('id');
            $table->dateTime('game_date')->nullable()->after('away_id');
            $table->smallInteger('half_home_result')->nullable()->after('away_id');
            $table->smallInteger('half_away_result')->nullable()->after('half_home_result');
            $table->smallInteger('final_home_result')->nullable()->after('half_away_result');
            $table->smallInteger('final_away_result')->nullable()->after('final_home_result');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('games', function (Blueprint $table) {
            $table->dropColumn(['status', 'round', 'game_date', 'half_home_result', 'half_away_result', 'final_home_result', 'final_away_result']);
        });
    }
};
