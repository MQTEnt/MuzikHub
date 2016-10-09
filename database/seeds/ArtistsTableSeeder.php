<?php

use Illuminate\Database\Seeder;

class ArtistsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        DB::table('artists')->insert([
        	'name' => 'Maroon5',
        	'description' => 'Maroon 5 is an American pop rock band that originated in Los Angeles, California.Before the current group was established, the original four members, Adam Levine (lead vocals, lead guitar), Jesse Carmichael (rhythm guitar, backing vocals) Mickey Madden (bass guitar) and Ryan Dusick (drums), formed a band known as Kara\'s Flowers in 1994, while they were still in high school. The band, which self-released an album called We Like Digging?, then signed to Reprise Records and released the album The Fourth World in 1997. After the album garnered a tepid response, the band parted ways with the record label and the members attended college.',
        ]);
        DB::table('artists')->insert([
        	'name' => 'Coldplay',
        	'description' => 'Coldplay are a British rock band formed in 1996 by lead vocalist and pianist Chris Martin and lead guitarist Jonny Buckland at University College London (UCL)'
        ]);
        DB::table('artists')->insert([
        	'name' => 'Sơn Tùng M-TP',
        	'description' => 'Nguyễn Thanh Tùng hay được biết đến với nghệ danh Sơn Tùng M-TP là một ca sĩ nhạc pop Việt Nam. Sơn Tùng từng đoạt hai giải Bài hát yêu thích với các ca khúc "Cơn mưa ngang qua" và "Em của ngày hôm qua"'
        ]);
    }
}
