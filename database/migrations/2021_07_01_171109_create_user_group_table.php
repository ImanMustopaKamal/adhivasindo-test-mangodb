<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateUserGroupTable extends Migration
{
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)
        ->table('user_group', function (Blueprint $collection) 
        {
            $collection->increments('user_group_id');
            $collection->string('user_id');
            $collection->string('group_id');
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
        ->table('user_group', function (Blueprint $collection) 
        {
            $collection->drop();
        });
    }
}
