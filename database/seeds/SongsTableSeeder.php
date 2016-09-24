<?php
use Illuminate\Database\Seeder;
class SongsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
    	$date = new DateTime();
    	echo $date->format('Y-m-d');
        DB::table('songs')->insert([
        	'name' => 'First song',
        	'year_composed' => $date,
        	'path' => 'music.dev',
        	'description' => 'Blah blah...'
        ]);
    }
}
