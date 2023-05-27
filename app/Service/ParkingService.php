<?php

namespace insectdie\PHP\MVC\Service;

use insectdie\PHP\MVC\Config\Database;
use insectdie\PHP\MVC\Exception\ValidationException;
use insectdie\PHP\MVC\Model\ParkingAddRequest;
use insectdie\PHP\MVC\Model\ParkingAddResponse;
use insectdie\PHP\MVC\Repository\ParkingRepository;
use insectdie\PHP\MVC\Domain\Parking;

use function PHPUnit\Framework\throwException;

class ParkingService 
{
    private ParkingRepository $parkingRepository;

    public function __construct(ParkingRepository $parkingRepository)
    {
        $this->parkingRepository = $parkingRepository;
    }

    public function add(ParkingAddRequest $request): ParkingAddResponse {
        $this->validateParkingAddFunction($request);

        // $user = $this->userRepository->findById($request->id);
        // if($user != null) {
        //     throw new ValidationException("User is already exist!");
        // }

        try {
            Database::beginTransaction();
            $parking = new Parking();
            $parking->id = $request->id;
            $parking->tanggal_masuk = $request->tanggal_masuk;
            $parking->tanggal_keluar = $request->tanggal_keluar;
    
            $this->parkingRepository->save($parking);
    
            $response = new ParkingAddResponse();
            $response->parking = $parking;

            Database::commitTransaction();
            return $response;
        } catch (\Exception $exception) {
            Database::rollbackTransaction();
            throw $exception;
        }
    }

    private function validateParkingAddFunction(ParkingAddRequest $request) 
    {
        if($request->id == null || $request->tanggal_masuk == null || $request->tanggal_keluar == null ||
        trim($request->id) == "" || trim($request->tanggal_masuk) == "" || trim($request->tanggal_keluar) == "") {
            throw new ValidationException("Tanggal masuk & Tanggal Keluar can not blank");
        }
    }

    

}