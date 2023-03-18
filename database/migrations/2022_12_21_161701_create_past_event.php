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
        Schema::create('events', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->date('date');
            $table->longText('content');
            $table->longText('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('events_backup', function (Blueprint $table) {
            $table->id();
            $table->longText('title');
            $table->date('date');
            $table->longText('content');
            $table->longText('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

         // Create the backup trigger for that table before update
         DB::unprepared("
         CREATE TRIGGER backup_event_before_update
             BEFORE UPDATE 
             ON events FOR EACH ROW
         BEGIN	
             INSERT INTO events_backup(title, date, content, image)
             VALUES(old.title, old.date, old.content, old.image);
         END;
         ");

         // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_event_after_insert
            AFTER INSERT 
            ON events FOR EACH ROW
        BEGIN	
            INSERT INTO events_backup(title, date, content, image)
            VALUES(NEW.title, NEW.date, NEW.content, NEW.image);
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
        Schema::dropIfExists('event');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_event_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_event_after_insert`;');
    }
};
