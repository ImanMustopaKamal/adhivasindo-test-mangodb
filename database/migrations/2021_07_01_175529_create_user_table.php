<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateUserTable extends Migration
{
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)
        ->table('user', function (Blueprint $collection) 
        {
            $collection->increments('user_id');
            $collection->string('nama');
            $collection->string('user');
            $collection->unique('email');
            $collection->string('password');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::connection($this->connection)
        ->table('user', function (Blueprint $collection) 
        {
            $collection->drop();
        });
    }
}
