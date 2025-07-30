<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Transaction;
use App\Models\Instrument;


class TransactionSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $gitar = Instrument::where('name', 'Gitar Akustik')->first();
        $drum = Instrument::where('name', 'Drum Elektrik')->first();

        // Transaksi pertama (masuk)
        $t1 = Transaction::create([
            'instrument_id' => $gitar->id,
            'type' => 'in',
            'quantity' => 5,
            'previous_transaction_id' => null,
            'transacted_at' => now()->subDays(5),
        ]);

        // Transaksi kedua (keluar)
        $t2 = Transaction::create([
            'instrument_id' => $gitar->id,
            'type' => 'out',
            'quantity' => 2,
            'previous_transaction_id' => $t1->id,
            'transacted_at' => now()->subDays(2),
        ]);

        // Transaksi ketiga (masuk)
        Transaction::create([
            'instrument_id' => $drum->id,
            'type' => 'in',
            'quantity' => 4,
            'previous_transaction_id' => null,
            'transacted_at' => now()->subDays(3),
        ]);
    }
}
