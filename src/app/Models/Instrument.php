<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Instrument extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'brand', 'stock', 'category_id'];

    // Relasi ke kategori
    public function category() {
        return $this->belongsTo(Category::class);
    }

    // Relasi ke alat musik lain (Graph)
    public function relations() {
        return $this->hasMany(InstrumentRelation::class);
    }

    public function relatedInstruments() {
        return $this->belongsToMany(
            Instrument::class,
            'instrument_relations',
            'instrument_id',
            'related_instrument_id',
        );
    }
}