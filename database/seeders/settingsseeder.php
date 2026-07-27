<?php

namespace Database\Seeders;

use App\Models\settings;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class settingsseeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $settings = ['phone'=> '01767799476',
        'email'=>'sakilahmedtanjil',
        'adress'=>'Tangail,Gopalpur',
        'facebook'=>'https://www.facebook.com/reel/1470121384797725',
        'twitter'=>'https://www.facebook.com/reel/1470121384797725',
        'instagram'=>'https://www.facebook.com/reel/1470121384797725',
        'youtube'=>'https://www.youtube.com/watch?v=iYlODtkyw_I',
        'logo'=>'https://www.facebook.com/reel/1470121384797725',
        'hero_image'=>'https://www.facebook.com/reel/1470121384797725'
        ];
        settings::insert($settings);
    }
}
