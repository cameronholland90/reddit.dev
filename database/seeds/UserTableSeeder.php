<?php

use Illuminate\Database\Seeder;

class UserTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 1000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 2000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 3000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 4000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 5000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 6000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 7000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 8000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 9000 user records');
        factory(App\User::class, 1000)->create();
        $this->command->info('Created 10000 user records');
    }
}
