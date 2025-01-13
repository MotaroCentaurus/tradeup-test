<?php

namespace App\UseCase;

use App\DTO\ZipCodeResponseDTO;
use App\DTO\ZipCodeRequestDTO;
use App\Service\ZipServiceInterface;
use App\Service\ViaCepService;
use App\Repository\ZipRepositoryInterface;

class GetAddressByZipCodeUseCase
{
  private ZipCodeRequestDTO $requestDTO;
  private ZipRepositoryInterface $repository;

  public function __construct(
    ZipCodeRequestDTO $requestDTO,
    ZipRepositoryInterface $repository
  )
  {
    $this->requestDTO = $requestDTO;
    $this->repository = $repository;
  }

  public function __invoke(): ZipCodeResponseDTO
  {
    $response = $this->repository->getAddressByZipCode($this->requestDTO);
    return $response;
  }
}