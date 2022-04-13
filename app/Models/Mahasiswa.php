<?php

namespace App\Models;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; //Model Eloquent
use App\Models\Mahasiswa;

class Mahasiswa extends Model //Definisi Model
{
    protected $table='mahasiswa'; // Eloquent akan membuat model mahasiswa menyimpan record di tabel mahasiswa
    protected $primaryKey = 'nim'; // Memanggil isi DB Dengan primarykey
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
    'Nim',
    'Nama',
    'kelas_id',
    'Jurusan',
    // 'Jenis_Kelamin',
    // 'Email',
    // 'Alamat',
    // 'Tanggal_Lahir',
    ];
    public function kelas()
    {
        return $this->belongsTo(Kelas::class);
    }
}
