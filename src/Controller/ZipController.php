<?php

namespace App\Controller;

use App\DTO\ZipCodeRequestDTO;
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
        echo "Updating zip by uf: $uf\r\n";
        echo "Updating zip by city: " .urldecode($city) . "\r\n";
        echo "Updating zip by street:" . urldecode($street) . "\r\n";
    }
}