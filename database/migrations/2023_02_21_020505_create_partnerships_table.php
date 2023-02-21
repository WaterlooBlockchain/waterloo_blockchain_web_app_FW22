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
        // Create the main table
        Schema::create('partnerships', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('link');
            $table->boolean('isCurrent');
            $table->longText('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Create the backup table
        Schema::create('partnerships_backup', function (Blueprint $table) {
            $table->id();
            $table->text('name');
            $table->text('link');
            $table->boolean('isCurrent');
            $table->longText('image');
            $table->timestamp('created_at')->useCurrent();
            $table->timestamp('updated_at')->useCurrent()->useCurrentOnUpdate();
        });

        // Create the backup trigger for that table before update
        DB::unprepared("
        CREATE TRIGGER backup_partnership_before_update
            BEFORE UPDATE 
            ON partnerships FOR EACH ROW
        BEGIN	
            INSERT INTO partnerships_backup(name, link, isCurrent, image)
            VALUES(old.name, old.link, old.isCurrent, old.image);
        END;
        ");

        // Create the backup trigger for that table after insert
        DB::unprepared("
        CREATE TRIGGER backup_partnership_after_insert
            AFTER INSERT 
            ON partnerships FOR EACH ROW
        BEGIN	
            INSERT INTO partnerships_backup(name, link, isCurrent, image)
            VALUES(NEW.name, NEW.link, NEW.isCurrent, NEW.image);
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
        Schema::dropIfExists('partnerships');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_partnership_before_update`;');
        DB::unprepared('DROP TRIGGER IF EXISTS `backup_partnership_after_insert`;');
    }
};
