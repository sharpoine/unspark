<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Schema;

class PostView extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        DB::statement('CREATE VIEW postView AS SELECT posts.id AS post_id,posts.baslik,posts.slug,posts.icerik,posts.onizleme,posts.aktif,posts.created_at,posts.updated_at,admins.id AS admin_id,
        admins.name AS admin_name FROM posts INNER JOIN admins ON admins.id=posts.kullanici_id ');
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::statement('DROP VIEW postView');
    }
}
