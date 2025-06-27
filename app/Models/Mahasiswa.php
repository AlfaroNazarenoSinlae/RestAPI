<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Mahasiswa extends Model
{
    use HasFactory;

    // Nama tabel di database (HARUS sesuai dengan migration)
    protected $table = 'mahasiswas';

    // Kolom primary key (karena tidak menggunakan id)
    protected $primaryKey = 'nim';

    // Primary key bukan auto increment
    public $incrementing = false;

    // Tipe data primary key
    protected $keyType = 'string';

    // Kolom-kolom yang boleh diisi secara massal (mass assignment)
    protected $fillable = [
        'nim',
        'nama',
        'jk',
        'tgl_lahir',
        'jurusan',
        'alamat',
    ];
}
