<?php

namespace App\Models;

use App\Models\Acara;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Pembicara extends Model
{
    use HasFactory;
    protected $fillable = ['id', 'acara_id', 'nama_pembicara', 'biografi', 'foto'];
    protected $primaryKey = 'id';
    public $incrementing = true;
    
    public function Acara(): BelongsTo{
        return $this->belongsTo(Acara::class);
    }

    public function getNamaAcaraAttribute()
    {
        $acara = Acara::join('pembicaras', 'acaras.id', '=', 'pembicaras.acara_id')
            ->where('pembicaras.id', $this->id)
            ->first();

        return $acara ? $acara->nama_acara : null;
    }
}
