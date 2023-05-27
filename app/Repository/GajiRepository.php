<?php

namespace insectdie\PHP\MVC\Repository;

use insectdie\PHP\MVC\Domain\Gaji;

class GajiRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function save(Gaji $gaji): Gaji {
        // $statement = $this->connection->prepare("INSERT INTO gaji_karyawan(golongan, jumlah_kehadiran, jumlah_cuti, jam_lembur, gaji) VALUES (?, ?, ?, ?, 1000)");
        $statement = $this->connection->prepare("INSERT INTO gaji_karyawan(golongan, jumlah_kehadiran, jumlah_cuti, jam_lembur, gaji) 
        VALUES (?, ?, ?, ?, 
                (select gaji_total + lembur as grand_total_gaji from (
                    select gaji_total , round(2 * 1 / 187 * gaji_total, -3) as lembur from (
                        SELECT (gaji_pokok + (22 *uang_kehadiran) ) as gaji_total FROM aturan_gaji WHERE golongan = ?
                    )A
                )X)
               )");
        
        
        $statement->execute([
            $gaji->golongan, $gaji->jml_kehadiran, $gaji->jml_kehadiran, $gaji->jam_lembur, $gaji->golongan
        ]);
        return $gaji;
    }

    public function hitungParkir($awal, $akhir) {
        $waktu_awal     =strtotime($awal);
        $waktu_akhir    =strtotime($akhir); 
        //menghitung selisih dengan hasil detik
        $diff    =$waktu_akhir - $waktu_awal;

        //membagi detik menjadi jam
        $jam    =floor($diff / (60 * 60));

        if ($jam < 1) {
            return 5000;
        } else if ($jam > 1) {
            return 5000 + ($jam * 4000);
        }
    }

}