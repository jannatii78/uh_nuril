<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Buku extends Model
{
    use HasFactory;

    protected $table = 'bukus';

    protected $fillable = ['judul', 'tahun', 'penulis', 'penerbit', 'cover'];

    public function penerbit()
    {
        return $this->belongsTo(Penerbit::class, 'penerbit_id');
    }
}
