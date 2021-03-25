<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class UpdatePostsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::table('posts', function (Blueprint $table) {
            //creazione della colonna 
            $table->unsignedBigInteger('user_id');
            //creazione della relazione
            $table ->foreign('user_id')
                    ->references('id')
                    ->on('users');
            //abbreviazione da riga 20 a riga 22
            //$table->foreignId('user_id')->constrained();

        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        //perchè cancelliamo la relazione e la colonna??
        Schema::table('posts', function (Blueprint $table) {
            //cancello la relazione
            $table -> dropForeign(['user_id']);
            //cancello la colonna
            $table -> dropColumn('user_id');
        });
    }
}
