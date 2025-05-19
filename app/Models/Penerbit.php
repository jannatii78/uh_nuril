<?php


namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Penerbit extends Model
{
    protected $table = 'penerbits';
    protected $fillable = ['nama_penerbit', 'alamat'];
    public function buku()
    {
        return $this->hasMany(Buku::class);
    }
}

