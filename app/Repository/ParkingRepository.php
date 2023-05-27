<?php

namespace insectdie\PHP\MVC\Repository;

use insectdie\PHP\MVC\Domain\Parking;

class ParkingRepository
{
    private \PDO $connection;

    public function __construct(\PDO $connection)
    {
        $this->connection = $connection;
    }
    
    public function save(Parking $parking): Parking {
        $statement = $this->connection->prepare("INSERT INTO parking_rates(id, jam_masuk, jam_keluar, tarif) VALUES (?, STR_TO_DATE(?, '%d-%m-%Y %H:%i'), STR_TO_DATE(?, '%d-%m-%Y %H:%i'), ?)");
        $statement->execute([
            $parking->id, $parking->tanggal_masuk, $parking->tanggal_keluar, 
            2000
            // $this->hitungParkir($parking->tanggal_masuk, $parking->tanggal_keluar)
        ]);
        return $parking;
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