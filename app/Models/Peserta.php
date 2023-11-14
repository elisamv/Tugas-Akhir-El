<?php

namespace App\Models;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Peserta extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'acara_id', 'nama_peserta', 'asal_instansi', 'nomor_hp'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    public function Acara(): BelongsTo{
        return $this->belongsTo(Acara::class);
    }

    public function getNamaAcaraAttribute()
    {
        $acara = Acara::join('pesertas', 'acaras.id', '=', 'pesertas.acara_id')
            ->where('pesertas.id', $this->id)
            ->first();

        return $acara ? $acara->nama_acara : null;
    }
}
