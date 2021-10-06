<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class AddOndeleteConstraintsToGamePlayerTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('game_player', function (Blueprint $table) {
            $table->dropForeign('game_player_game_id_foreign');
            $table->dropForeign('game_player_player_id_foreign');

            $table->foreignId('game_id')->change()->constrained()->cascadeOnDelete();
            $table->foreignId('player_id')->change()->constrained()->cascadeOnDelete();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::table('game_player', function (Blueprint $table) {
            //
        });
    }
}
