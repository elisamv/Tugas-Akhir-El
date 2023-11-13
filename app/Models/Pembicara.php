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
    public function Acara(): BelongsTo{
        return $this->belongsTo(Acara::class);
    }
}
