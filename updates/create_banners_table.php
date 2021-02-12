<?php namespace Dmrch\Banner\Updates;

use Schema;
use October\Rain\Database\Schema\Blueprint;
use October\Rain\Database\Updates\Migration;

class CreateBannersTable extends Migration
{
    public function up()
    {
        Schema::create('dmrch_banner_banners', function(Blueprint $table) {
            $table->engine = 'InnoDB';
            $table->increments('id');
            $table->integer('group_id');
            $table->string('title', 255);
            $table->text('description');
            $table->text('link');
            $table->string('btn_title', 150);
            $table->enum('link_on', ['0','1']);
            $table->enum('target', ['_blank','_self']);
            $table->tinyInteger('status');
            $table->integer('sort_order')->nullable();
            $table->timestamp('published_at')->nullable()->useCurrent();
            $table->timestamps();
        });
    }

    public function down()
    {
        Schema::dropIfExists('dmrch_banner_banners');
    }
}
