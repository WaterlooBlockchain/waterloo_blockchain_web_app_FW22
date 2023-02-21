<?php

use Illuminate\Support\Facades\Schema;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Support\Facades\DB;

class CreateBlogPostsTable extends Migration
{
    public function up()
    {
        // Create the main table
        Schema::create('blog_posts', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->boolean('isFeatured');
            $table->longText('image');
            $table->text('tags');
            $table->longText('content');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });
        
        // Create the backup table
        Schema::create('blog_posts_backup', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->boolean('isFeatured');
            $table->longText('image');
            $table->text('tags');
            $table->longText('content');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Create the backup trigger for that table before update
        DB::unprepared("
        CREATE TRIGGER backup_blog_post_before_update
            BEFORE UPDATE 
            ON blog_posts FOR EACH ROW
        BEGIN	
            INSERT INTO blog_posts_backup(title, isFeatured, image, tags, content)
            VALUES(old.title, old.isFeatured, old.image, old.tags, old.content);
        END;
        ");

        // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_blog_post_after_insert
            AFTER INSERT 
            ON blog_posts FOR EACH ROW
        BEGIN	
            INSERT INTO blog_posts_backup(title, isFeatured, image, tags, content)
            VALUES(NEW.title, NEW.isFeatured, NEW.image, NEW.tags, NEW.content);
        END;
        ");
    }

    public function down()
    {
        Schema::dropIfExists('blogs');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_blog_post_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_blog_post_after_insert`;');
    }
}
