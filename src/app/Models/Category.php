<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'parent_id'];

    // Kategori induk
    public function parent() {
        return $this->belongsTo(Category::class, 'parent_id');
    }

    // Kategori anak
    public function children() {
        return $this->hasMany(Category::class, 'parent_id');
    }

    // Alat musik yang termasuk dalam kategori ini
    public function instruments() {
        return $this->hasMany(Instrument::class);
    }
}
