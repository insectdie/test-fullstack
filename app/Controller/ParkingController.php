<?php

namespace insectdie\PHP\MVC\Controller;

use insectdie\PHP\MVC\App\View;
use insectdie\PHP\MVC\Config\Database;
use insectdie\PHP\MVC\Repository\ParkingRepository;
use insectdie\PHP\MVC\Service\ParkingService;
use insectdie\PHP\MVC\Model\ParkingAddRequest;
use insectdie\PHP\MVC\Exception\ValidationException;

class ParkingController
{
    private ParkingService $parkingService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $parkingRepository = new ParkingRepository($connection);
        $this->parkingService = new ParkingService($parkingRepository);
    }

    function index() : void 
    {
        View::render('Parking/index',[
            "title" => "Tarif Parkir Mobil"
        ]);
    }

    function viewAdd() : void 
    {
        View::render('Parking/form-add',[
            "title" => "Tarif Parkir Mobil"
        ]);
    }

    public function add() {
        $request = new ParkingAddRequest();
        $request->id = uniqid();
        $request->tanggal_masuk = $_POST['tanggal_masuk'] . " " . $_POST['jam_masuk'] . ":" . $_POST['menit_masuk'];
        $request->tanggal_keluar = $_POST['tanggal_keluar'] . " " . $_POST['jam_keluar'] . ":" . $_POST['menit_keluar'];

        try {
            $this->parkingService->add($request);
            View::redirect('/parking_rates');
        } catch (ValidationException $exception) {
            View::render('Parking/index', [
                'title' => 'Add Parking Rates',
                'error' => $exception->getMessage()
            ]);
        }
    }
}