<?php

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
        $t1 = 'implementing oAith2 with laravel1';
        $t2 = 'implementing oAith2 with laravel2';
        $t3 = 'implementing oAith2 with laravel3';
        $t4 = 'implementing oAith2 with laravel4';

        $d1 = [
          'title' => $t1,
          'content' => 'Lolem isum doler sit1',
          'channel_id' => 1,
          'user_id' => 1,
          'slug' => str_slug($t1)
        ];
        $d2 = [
          'title' => $t2,
          'content' => 'Lolem isum doler sit2',
          'channel_id' => 2,
          'user_id' => 1,
          'slug' => str_slug($t2)
        ];
        $d3 = [
          'title' => $t3,
          'content' => 'Lolem isum doler sit3',
          'channel_id' => 3,
          'user_id' => 2,
          'slug' => str_slug($t3)
        ];
        $d4 = [
          'title' => $t4,
          'content' => 'Lolem isum doler sit4',
          'channel_id' => 4,
          'user_id' => 2,
          'slug' => str_slug($t4)
        ];

        App\Discussion::create($d1);
        App\Discussion::create($d2);
        App\Discussion::create($d3);
        App\Discussion::create($d4);
    }
}
