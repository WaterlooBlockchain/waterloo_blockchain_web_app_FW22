<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;
use Illuminate\Support\Facades\DB;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('socials', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('text');
            $table->longText('link');
            $table->longText('icon');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('socials_backup', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('text');
            $table->longText('link');
            $table->longText('icon');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Create the backup trigger for that table before update
        DB::unprepared("
        CREATE TRIGGER backup_social_before_update
            BEFORE UPDATE 
            ON socials FOR EACH ROW
        BEGIN	
            INSERT INTO socials_backup(name, text, link, icon)
            VALUES(old.name, old.text, old.link, old.icon);
        END;
        ");

        // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_social_after_insert
            AFTER INSERT 
            ON socials FOR EACH ROW
        BEGIN	
            INSERT INTO socials_backup(name, text, link, icon)
            VALUES(NEW.name, NEW.text, NEW.link, NEW.icon);
        END;
        ");
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('socials');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_social_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_social_after_insert`;');
    }
};
