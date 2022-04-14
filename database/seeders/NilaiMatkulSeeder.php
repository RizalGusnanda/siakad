<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
class NilaiMatkulSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        $nilaiMatkul = [
            [   'mahasiswa_id' => 2,
                'matakuliah_id'=>3,
                'nilai_angka' => 95,
                'nilai_huruf'=>'A'
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>1,
                'nilai_angka' => 90,
                'nilai_huruf'=>'A',
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>2,
                'nilai_angka' => 90,
                'nilai_huruf'=>'A',
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>3,
                'nilai_angka' => 90,
                'nilai_huruf'=>'A',
            ],
            [   'mahasiswa_id' => 1,
                'matakuliah_id'=>4,
                'nilai_angka' => 90,
                'nilai_huruf'=>'A',
            ],

            [   'mahasiswa_id' => 3,
                'matakuliah_id'=>1,
                'nilai_angka' => 83,
                'nilai_huruf'=>'B',
            ],
            [   'mahasiswa_id' => 6,
                'matakuliah_id'=>2,
                'nilai angka' => 80,
                'nilai_huruf'=>'B',
            ],
            [   'mahasiswa_id' => 7,
                'matakuliah_id'=>3,
                'nilai_angka' => 75,
                'nilai_huruf'=>'C',
            ],
            [   'mahasiswa_id' => 8,
                'matakuliah_id'=>3,
                'nilai_angka' => 77,
                'nilai_huruf'=>'C',
            ],
           
        ];
        DB::table('mahasiswa_matakuliah')->insert($nilaiMatkul);
    }
    
}
