<?php

namespace App\UseCase;

use App\DTO\LocationRequestDTO;
use App\DTO\ZipCodeRequestDTO;
use App\Service\ZipServiceInterface;
use App\Service\ViaCepService;
use App\Repository\ZipRepositoryInterface;

class GetAddressByLocationUseCase
{
  private LocationRequestDTO $requestDTO;
  private ZipRepositoryInterface $repository;

  public function __construct(
    LocationRequestDTO $requestDTO,
    ZipRepositoryInterface $repository
  )
  {
    $this->requestDTO = $requestDTO;
    $this->repository = $repository;
  }

  public function __invoke(): array
  {
    $response = $this->repository->getAddressByLocation($this->requestDTO);
    return $response;
  }
}