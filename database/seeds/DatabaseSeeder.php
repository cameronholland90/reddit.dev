<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;

class DatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Model::unguard();

        $this->command->info('Deleting votes records');
        DB::table('votes')->delete();
        $this->command->info('Deleting posts records');
        DB::table('posts')->delete();
        $this->command->info('Deleting users records');
        DB::table('users')->delete();

        $this->call(UserTableSeeder::class);
        $this->call(PostsTableSeeder::class);
        $this->call(VotesTableSeeder::class);

        Model::reguard();
    }
}
