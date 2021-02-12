<?php namespace Dmrch\Banner\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateGroupsTable extends Migration
{
    public function up()
    {
        Schema::create('dmrch_banner_groups', function (Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->string('title', 255);
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dmrch_banner_groups');
    }
}
