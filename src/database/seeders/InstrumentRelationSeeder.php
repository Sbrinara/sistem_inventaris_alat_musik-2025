<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Instrument;
use App\Models\InstrumentRelation;

class InstrumentRelationSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gitar = Instrument::where('name', 'Gitar Akustik')->first();
        $ukulele = Instrument::where('name', 'Ukulele Kecil')->first();
        $drum = Instrument::where('name', 'Drum Elektrik')->first();
        $piano = Instrument::where('name', 'Piano Digital')->first();
        $sax = Instrument::where('name', 'Saxophone Alto')->first();

        // Tambahkan relasi dua arah
        $this->relate($gitar, $ukulele);
        $this->relate($gitar, $drum);
        $this->relate($drum, $piano);
        $this->relate($piano, $sax);
    }

    private function relate($a, $b)
    {
        // Cek agar tidak duplikat
        InstrumentRelation::firstOrCreate([
            'instrument_id' => $a->id,
            'related_instrument_id' => $b->id
        ]);

        InstrumentRelation::firstOrCreate([
            'instrument_id' => $b->id,
            'related_instrument_id' => $a->id
        ]);
    }
}
