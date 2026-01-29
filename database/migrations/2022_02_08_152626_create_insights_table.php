<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateInsightsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('insights', function (Blueprint $table) {
            $table->increments('id');
            $table->text('image')->nullable();
            $table->string('slug')->nullable();
            $table->string('title')->nullable();
            $table->longText('body')->nullable();
            $table->string('head1')->nullable();
            $table->string('tag1')->nullable();
            $table->string('tag2')->nullable();
            $table->string('tag3')->nullable();
            $table->longText('paragraph1')->nullable();
            $table->string('head2')->nullable();
            $table->longText('paragraph2')->nullable();
            $table->string('head3')->nullable();
            $table->longText('paragraph3')->nullable();
            $table->string('head4')->nullable();
            $table->longText('paragraph4')->nullable();
            $table->string('head5')->nullable();
            $table->longText('paragraph5')->nullable();
            $table->string('head6')->nullable();
            $table->longText('paragraph6')->nullable();
            $table->string('head7')->nullable();
            $table->longText('paragraph7')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('insights');
    }
}
