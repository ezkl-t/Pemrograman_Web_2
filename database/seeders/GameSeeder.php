<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class GameSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        //
        DB::table('beli_game')->insert([
            'nama'=>'Battlefield 1',
            'platform'=>'Windows, XBOX, PS',
            'tahun_rilis'=>'2016',
            'ukuran_game'=>'81++ GB',
            'genre'=>'FPS, Massive Multiplayer',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('beli_game')->insert([
            'nama'=>'The Witcher 3',
            'platform'=>'Windows, XBOX, PS, Nintendo Switch',
            'tahun_rilis'=>'2015',
            'ukuran_game'=>'70++ GB',
            'genre'=>'Open World, Action RPG, Fighting',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
        DB::table('beli_game')->insert([
            'nama'=>'Dishonored 2',
            'platform'=>'Windows, XBOX, PS',
            'tahun_rilis'=>'2016',
            'ukuran_game'=>'60+ GB',
            'genre'=>'Stealth, Action Adventure',
            'created_at'=>date('Y-m-d H:i:s'),
        ]);
    }
}
