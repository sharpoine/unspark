<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class PostMigration extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        //ilişkisel verileri eklemeyi unutma
        Schema::create('posts',function(Blueprint $table){
            $table->bigIncrements('id');
            $table->string('baslik');
            $table->string('slug');
            $table->text('icerik');
            $table->string('onizleme')->nullable();
            $table->tinyInteger('aktif')->default(0);
            $table->bigInteger('kullanici_id')->unsigned();
            $table->timestamps();
        });
        Schema::table('posts',function(Blueprint $table){
            $table->foreign('kullanici_id')->references('id')->on('admins')->onDelete('cascade');
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('posts');
    }
}
