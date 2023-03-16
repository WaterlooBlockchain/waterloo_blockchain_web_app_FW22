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
        Schema::create('team_members', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('role');
            $table->integer('level');
            $table->longText('website')->nullable();
            $table->longText('telegram')->nullable();
            $table->longText('email')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('team_members_backup', function (Blueprint $table) {
            $table->id();
            $table->longText('name');
            $table->longText('role');
            $table->integer('level');
            $table->longText('website')->nullable();
            $table->longText('telegram')->nullable();
            $table->longText('email')->nullable();
            $table->longText('linkedin')->nullable();
            $table->longText('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Create the backup trigger for that table before update
        DB::unprepared("
        CREATE TRIGGER backup_team_member_before_update
            BEFORE UPDATE 
            ON team_members FOR EACH ROW
        BEGIN	
            INSERT INTO team_members_backup(name, role, level, website, telegram, email, linkedin, image)
            VALUES(old.name, old.role, old.level, old.website, old.telegram, old.email, old.linkedin, old.image);
        END;
        ");

        // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_team_member_after_insert
            AFTER INSERT 
            ON team_members FOR EACH ROW
        BEGIN	
            INSERT INTO team_members_backup(name, role, level, website, telegram, email, linkedin, image)
            VALUES(NEW.name, NEW.role, NEW.level, NEW.website, NEW.telegram, NEW.email, NEW.linkedin, NEW.image);
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
        Schema::dropIfExists('team_members');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_team_member_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_team_member_after_insert`;');
    }
};
