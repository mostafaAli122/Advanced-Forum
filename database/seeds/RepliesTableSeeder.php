<?php

use Illuminate\Database\Seeder;
use App\Reply;
class RepliesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $r1=[
            'user_id' => 1,
            'discussion_id' => 1,
            'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.'
        ];
        $r2=[
            'user_id' => 1,
            'discussion_id' => 2,
            'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.'
        ];
        $r3=[
            'user_id' => 2,
            'discussion_id' => 3,
            'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.'
        ];
        $r4=[
            'user_id' => 4,
            'discussion_id' => 4,
            'content'=>'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.'
        ];
        Reply::create($r1);
        Reply::create($r2);
        Reply::create($r3);
        Reply::create($r4);
        
    }
}
