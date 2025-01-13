<?php

namespace App\Repository;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\DTO\ZipCodeResponseDTO;

interface ZipRepositoryInterface
{
  public function getAddressByLocation(LocationRequestDTO $requestDTO): ZipCodeResponseDTO;
  public function getAddressByZipCode(ZipCodeRequestDTO $requestDTO): ZipCodeResponseDTO;
}
