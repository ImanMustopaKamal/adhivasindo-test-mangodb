<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Foundation\Testing\DatabaseMigrations;

class CreateGroupTable extends Migration
{
    protected $connection = 'mongodb';

    public function up()
    {
        Schema::connection($this->connection)
        ->table('group', function (Blueprint $collection) 
        {
            $collection->increments('group_id');
            $collection->string('nama');
            $collection->string('keterangan');
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
        ->table('group', function (Blueprint $collection) 
        {
            $collection->drop();
        });
    }
}
