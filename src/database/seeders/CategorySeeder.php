<?php

namespace Database\Seeders;

use App\Models\Category;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;

class CategorySeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        // Kategori utama
        $petik = Category::create(['name' => 'Petik']);
        $tiup = Category::create(['name' => 'Tiup']);
        $pukul = Category::create(['name' => 'Pukul']);
        $keyboard = Category::create(['name' => 'Keyboard']);
        $gesek = Category::create(['name' => 'Gesek']);

        // Sub-kategori
        Category::insert([
            ['name' => 'Gitar', 'parent_id' => $petik->id],
            ['name' => 'Ukulele', 'parent_id' => $petik->id],
            ['name' => 'Saxophone', 'parent_id' => $tiup->id],
            ['name' => 'Flute', 'parent_id' => $tiup->id],
            ['name' => 'Drum', 'parent_id' => $pukul->id],
            ['name' => 'Cajon', 'parent_id' => $pukul->id],
            ['name' => 'Piano', 'parent_id' => $keyboard->id],
            ['name' => 'Synthesizer', 'parent_id' => $keyboard->id],
            ['name' => 'Biola', 'parent_id' => $gesek->id],
        ]);
    }
}
