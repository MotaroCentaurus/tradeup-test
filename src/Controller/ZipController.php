<?php

namespace App\Controller;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\UseCase\GetAddressByLocationUseCase;
use App\UseCase\GetAddressByZipCodeUseCase;
use App\Repository\ZipRepository;
use App\Service\ViaCepService;
use GuzzleHttp\Client;

class ZipController
{
    public function show(string $zipcode)
    {
        $request = new ZipCodeRequestDTO($zipcode);

        $httpClient = new Client();
        $service = new ViaCepService($httpClient);
        $repository = new ZipRepository($service);

        $response = (new GetAddressByZipCodeUseCase(
            $request,
            $repository
        ))();

        echo json_encode($response->toArray());
    }

    public function showZipByLocation(string $uf, string $city, string $street)
    {
        $request = new LocationRequestDTO($uf, $city, $street);

        $httpClient = new Client();
        $service = new ViaCepService($httpClient);
        $repository = new ZipRepository($service);

        $response = (new GetAddressByLocationUseCase(
            $request,
            $repository
        ))();

        $responseArray = array_map(function ($address) {
            return $address->toArray();
        }, $response);

        echo json_encode($responseArray);
    }
}