<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        // \App\Models\User::factory(10)->create();

        // \App\Models\User::factory()->create([
        //     'name' => 'Test User',
        //     'email' => 'test@example.com',
        // ]);

        $seed_blog_posts_sql = file_get_contents(database_path('seeds/blog_posts.sql'));
        $seed_past_events_sql = file_get_contents(database_path('seeds/past_events.sql'));
        DB::unprepared($seed_blog_posts_sql);
        DB::unprepared($seed_past_events_sql);
    }
}
