<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class beli_game extends Model
{
    use HasFactory;
    protected $table = 'beli_game';
    protected $fillable = ['nama', 'platform', 'tahun_rilis', 'ukuran_game', 'genre', 'harga', 'foto'];
}
