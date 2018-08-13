<?php

use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $channel1 = ['title' => 'Laravel'];
        $channel2 = ['title' => 'Vuejs'];
        $channel3 = ['title' => 'CSS3'];
        $channel4 = ['title' => 'Javascript'];
        $channel5 = ['title' => 'Php Testing'];

        $channel6 = ['title' => 'Spark'];
        $channel7 = ['title' => 'Luman'];
        $channel8 = ['title' => 'Forge'];

        App\Channel::create($channel1);
        App\Channel::create($channel2);
        App\Channel::create($channel3);
        App\Channel::create($channel4);

        App\Channel::create($channel5);
        App\Channel::create($channel6);
        App\Channel::create($channel7);
        App\Channel::create($channel8);
    }
}
