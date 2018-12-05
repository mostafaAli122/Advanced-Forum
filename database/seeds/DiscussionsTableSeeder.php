<?php
use App\Discussion;
use Illuminate\Database\Seeder;

class DiscussionsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $t1='Implementing OAUTH2 with laravel passport';
        $t2='Pagination in vuejs not working correctly';
        $t3='Vuejs event listeners for child components';
        $t4='Laravel homestead error - undetected database';

        $d1=[
            'title' => $t1,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.',
            'channel_id' =>1,
            'user_id' =>2,
            'slug' =>str_slug($t1)
        ];
        $d2=[
            'title' => $t2,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.',
            'channel_id' =>2,
            'user_id' =>1,
            'slug' =>str_slug($t2)
        ];
        $d3=[
            'title' => $t3,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.',
            'channel_id' =>2,
            'user_id' =>1,
            'slug' =>str_slug($t3)
        ];
        $d4=[
            'title' => $t4,
            'content' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. Ipsam modi ad cumque a voluptates inventore, quas exercitationem commodi sequi suscipit quod deserunt amet voluptatem, quis, veniam est similique possimus eligendi.',
            'channel_id' =>5,
            'user_id' =>1,
            'slug' =>str_slug($t4)
        ];
        Discussion::create($d1);
        Discussion::create($d2);
        Discussion::create($d3);
        Discussion::create($d4);
    }
}
