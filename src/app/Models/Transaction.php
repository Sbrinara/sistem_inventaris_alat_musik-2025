<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Transaction extends Model
{
     use HasFactory;

    protected $fillable = [
        'instrument_id',
        'type',
        'quantity',
        'previous_transaction_id',
        'transacted_at',
    ];

    public function instrument() {
        return $this->belongsTo(Instrument::class);
    }

    public function previous() {
        return $this->belongsTo(Transaction::class, 'previous_transaction_id');
    }

    public function next() {
        return $this->hasOne(Transaction::class, 'previous_transaction_id');
    }
}
