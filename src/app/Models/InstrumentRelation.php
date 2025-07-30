<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class InstrumentRelation extends Model
{
    use HasFactory;

    protected $fillable = ['instrument_id', 'related_instrument_id'];

    public function instrument() {
        return $this->belongsTo(Instrument::class, 'instrument_id');
    }

    public function relatedInstrument() {
        return $this->belongsTo(Instrument::class, 'related_instrument_id');
    }
}
