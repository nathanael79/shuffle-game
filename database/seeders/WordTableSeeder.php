<?php

namespace Database\Seeders;

use App\Models\Word;
use Illuminate\Database\Seeder;

class WordTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $json = file_get_contents(public_path().'/words_dictionary.json');
        $data = json_decode($json, true);

        foreach ($data as $index => $datum){
            Word::create([
                'name' => $index
            ]);
        }
    }
}
