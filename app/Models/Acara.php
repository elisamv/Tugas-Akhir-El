<?php

namespace App\Models;

use App\Models\Pembicara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Relations\HasMany;

class Acara extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'nama_acara', 'tanggal', 'lokasi'];
    public function Pembicara(): HasMany {
        return $this->hasMany(Pembicara::class);
    }
}
