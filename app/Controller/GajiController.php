<?php

namespace insectdie\PHP\MVC\Controller;

use insectdie\PHP\MVC\App\View;
use insectdie\PHP\MVC\Config\Database;
use insectdie\PHP\MVC\Repository\GajiRepository;
use insectdie\PHP\MVC\Service\GajiService;
use insectdie\PHP\MVC\Model\GajiAddRequest;
use insectdie\PHP\MVC\Exception\ValidationException;

class GajiController
{
    private GajiService $parkingService;

    public function __construct()
    {
        $connection = Database::getConnection();

        $parkingRepository = new GajiRepository($connection);
        $this->parkingService = new GajiService($parkingRepository);
    }

    function index() : void 
    {
        View::render('Gaji/index',[
            "title" => "Gaji Karyawan"
        ]);
    }

    function viewAdd() : void 
    {
        View::render('Gaji/form-add',[
            "title" => "Gaji Karyawan"
        ]);
    }

    public function add() {
        $request = new GajiAddRequest();
        $request->golongan = $_POST['golongan'];
        $request->jml_kehadiran = $_POST['jml_kehadiran'];
        $request->jml_cuti = $_POST['jml_cuti'];
        $request->jam_lembur = $_POST['jam_lembur'];

        try {
            $this->parkingService->add($request);
            View::redirect('/gaji');
        } catch (ValidationException $exception) {
            View::render('Gaji/index', [
                'title' => 'Add Gaji Karyawan',
                'error' => $exception->getMessage()
            ]);
        }
    }
}