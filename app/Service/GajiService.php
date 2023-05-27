<?php

namespace insectdie\PHP\MVC\Service;

use insectdie\PHP\MVC\Config\Database;
use insectdie\PHP\MVC\Exception\ValidationException;
use insectdie\PHP\MVC\Model\GajiAddRequest;
use insectdie\PHP\MVC\Model\GajiAddResponse;
use insectdie\PHP\MVC\Repository\GajiRepository;
use insectdie\PHP\MVC\Domain\Gaji;

use function PHPUnit\Framework\throwException;

class GajiService 
{
    private GajiRepository $gajiRepository;

    public function __construct(GajiRepository $gajiRepository)
    {
        $this->gajiRepository = $gajiRepository;
    }

    public function add(GajiAddRequest $request): GajiAddResponse {
        $this->validateGajiAddFunction($request);

        try {
            Database::beginTransaction();
            $gaji = new Gaji();
            $gaji->golongan = $request->golongan;
            $gaji->jml_kehadiran = $request->jml_kehadiran;
            $gaji->jml_cuti = $request->jml_cuti;
            $gaji->jam_lembur = $request->jam_lembur;
    
            $this->gajiRepository->save($gaji);
    
            $response = new GajiAddResponse();
            $response->gaji = $gaji;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateGajiAddFunction(GajiAddRequest $request) 
    {
        if($request->golongan == null || $request->jml_kehadiran == null || $request->jml_cuti == null || $request->jam_lembur == null ||
        trim($request->golongan) == "" || trim($request->jml_kehadiran) == "" || trim($request->jml_cuti) == "" || trim($request->jam_lembur) == "") {
            throw new ValidationException("Tanggal golongan, jml kehadiran, jml cuti, jam lembur can not blank");
        }
    }

    

}