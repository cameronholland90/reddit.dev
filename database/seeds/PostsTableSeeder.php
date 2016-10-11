<?php

use Illuminate\Database\Seeder;

class PostsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 1000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 2000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 3000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 4000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 5000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 6000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 7000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 8000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 9000 post records');
        factory(App\Post::class, 1000)->create();
        $this->command->info('Created 10000 post records');
    }
}
