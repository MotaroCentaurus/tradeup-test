<?php

namespace App\Controller;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\UseCase\GetAddressByLocationUseCase;
use App\UseCase\GetAddressByZipCodeUseCase;
use App\Repository\ZipRepository;
use App\Service\ViaCepService;

class ZipController
{
    public function show(string $zipcode)
    {
        $request = new ZipCodeRequestDTO($zipcode);

        $response = (new GetAddressByZipCodeUseCase(
            $request,
            new ZipRepository(new ViaCepService())
        ))();

        echo json_encode($response->toArray());
    }

    public function showZipByLocation(string $uf, string $city, string $street)
    {
        $request = new LocationRequestDTO($uf, $city, $street);

        $response = (new GetAddressByLocationUseCase(
            $request,
            new ZipRepository(new ViaCepService())
        ))();

        $responseArray = array_map(function ($address) {
            return $address->toArray();
        }, $response);

        echo json_encode($responseArray);
    }
}