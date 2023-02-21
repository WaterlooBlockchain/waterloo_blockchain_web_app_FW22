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
        Schema::create('past_events', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->date('date');
            $table->text('content');
            $table->longText('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        Schema::create('past_events_backup', function (Blueprint $table) {
            $table->id();
            $table->text('title');
            $table->date('date');
            $table->text('content');
            $table->longText('image')->nullable();
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

         // Create the backup trigger for that table before update
         DB::unprepared("
         CREATE TRIGGER backup_past_event_before_update
             BEFORE UPDATE 
             ON past_events FOR EACH ROW
         BEGIN	
             INSERT INTO past_events_backup(title, date, content, image)
             VALUES(old.title, old.date, old.content, old.image);
         END;
         ");

         // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_past_event_after_insert
            AFTER INSERT 
            ON past_events FOR EACH ROW
        BEGIN	
            INSERT INTO past_events_backup(title, date, content, image)
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
        Schema::dropIfExists('past_event');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_past_event_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_past_event_after_insert`;');
    }
};
