<?php
use App\Like;
use Illuminate\Database\Seeder;

class LikesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Like::create([
            'reply_id' => 2,
            'user_id' => 2
        ]);
        Like::create([
            'reply_id' => 2 ,
            'user_id' => 1
        ]);
    }
}
