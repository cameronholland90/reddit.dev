<?php

use Illuminate\Database\Seeder;

class VotesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $votes_created = App\Vote::count();
        $this->command->info('Starting at ' . $votes_created . ' vote records');
        while ($votes_created < 100000) {
            $user_id = App\User::all()->random()->id;
            $post_id = App\Post::all()->random()->id;
            $vote = App\Vote::where('post_id', $post_id)->where('user_id', $user_id)->first();
            if (!$vote) {
                $vote = new App\Vote;
                $vote->user_id = $user_id;
                $vote->post_id = $post_id;
                $vote->vote = mt_rand(0, 1);
                $vote->save();
                $votes_created++;
                $thousands_created = $votes_created / 1000;
                if ($votes_created % 1000 == 0) {
                    $this->command->info('Created ' . $thousands_created . '000 vote recoreds');
                }
            }
        }
        App\Post::calculateVoteScore();
    }
}
