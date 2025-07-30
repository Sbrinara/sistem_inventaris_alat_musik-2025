<?php

namespace Database\Seeders;

use App\Models\Category;
use App\Models\Instrument;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class InstrumentSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gitar = Instrument::create([
            'name' => 'Gitar Akustik',
            'stock' => 5,
            'category_id' => Category::where('name', 'Gitar')->first()->id
        ]);

        $ukulele = Instrument::create([
            'name' => 'Ukulele Kecil',
            'stock' => 3,
            'category_id' => Category::where('name', 'Ukulele')->first()->id
        ]);

        $sax = Instrument::create([
            'name' => 'Saxophone Alto',
            'stock' => 2,
            'category_id' => Category::where('name', 'Saxophone')->first()->id
        ]);

        $drum = Instrument::create([
            'name' => 'Drum Elektrik',
            'stock' => 4,
            'category_id' => Category::where('name', 'Drum')->first()->id
        ]);

        $piano = Instrument::create([
            'name' => 'Piano Digital',
            'stock' => 2,
            'category_id' => Category::where('name', 'Piano')->first()->id
        ]);
    }
}
