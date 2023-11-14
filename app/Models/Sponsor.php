<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Sponsor extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'acara_id', 'nama_sponsor', 'jenis'];
    
    protected $primaryKey = 'id';
    public $incrementing = true;

    public function Acara(): BelongsTo{
        return $this->belongsTo(Acara::class);
    }

    public function getNamaAcaraAttribute()
    {
        $acara = Acara::join('sponsors', 'acaras.id', '=', 'sponsors.acara_id')
            ->where('sponsors.id', $this->id)
            ->first();

        return $acara ? $acara->nama_acara : null;
    }
}
