<?php

use Illuminate\Database\Migrations\Migration;
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
        // Create the sanitization and desanitization functions
        $stored_functions = file_get_contents(database_path('stored_functions.sql'));
        DB::unprepared($stored_functions);

        // Create all the stored procedures for interacting with the different tables
        $stored_procedures = file_get_contents(database_path('stored_procedures.sql'));
        DB::unprepared($stored_procedures);
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        DB::unprepared("DROP FUNCTION IF EXISTS `sanitize_string`;");
        DB::unprepared("DROP FUNCTION IF EXISTS `desanitize_string`;");

        DB::unprepared("DROP PROCEDURE IF EXISTS GET_BLOG_POSTS;");
        DB::unprepared("DROP PROCEDURE IF EXISTS CREATE_BLOG_POST;");
        DB::unprepared("DROP PROCEDURE IF EXISTS UPDATE_BLOG_POST;");
        DB::unprepared("DROP PROCEDURE IF EXISTS DELETE_BLOG_POST;");

        DB::unprepared("DROP PROCEDURE IF EXISTS GET_PAST_EVENTS;");
        DB::unprepared("DROP PROCEDURE IF EXISTS CREATE_PAST_EVENT;");
        DB::unprepared("DROP PROCEDURE IF EXISTS UPDATE_PAST_EVENT;");
        DB::unprepared("DROP PROCEDURE IF EXISTS DELETE_PAST_EVENT;");
    }
};