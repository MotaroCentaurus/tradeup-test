<?php

namespace App\Repository;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\DTO\ZipCodeResponseDTO;
use App\Service\ZipServiceInterface;

class ZipRepository implements ZipRepositoryInterface
{
  private ZipServiceInterface $zipService;

  public function __construct(ZipServiceInterface $zipService)
  {
    $this->zipService = $zipService;
  }

  public function getAddressByLocation(LocationRequestDTO $requestDTO): ZipCodeResponseDTO
  {
    return $this->zipService->getAddressByLocation($requestDTO);
  }

  public function getAddressByZipCode(ZipCodeRequestDTO $requestDTO): ZipCodeResponseDTO
  {
    $response = $this->zipService->getAddressByZipCode($requestDTO);
    return $response;
  }
}