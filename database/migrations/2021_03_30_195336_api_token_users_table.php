<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class ApiTokenUsersTable extends Migration
{

    public function up()
    {
        Schema::table('users', function (Blueprint $table) {

            $table->string('api_token', 80)->after('password')
                        ->unique()
                        ->nullable()
                        ->default(null);
        });
    }

    public function down()
    {
        Schema::table('users', function (Blueprint $table) {
            $table->dropColumn('api_token');
        });
    }
}

// https://laravel.com/docs/5.8/api-authentication
// $table->string('api_token', 80)->after('password')
// ->unique()
// ->nullable()
// ->default(null);