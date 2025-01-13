<?php

namespace App\Service;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\DTO\ZipCodeResponseDTO;

interface ZipServiceInterface
{
  public function getAddressByZipCode(ZipCodeRequestDTO $requestDTO): ZipCodeResponseDTO;
  public function getAddressByLocation(LocationRequestDTO $requestDTO): array;
}