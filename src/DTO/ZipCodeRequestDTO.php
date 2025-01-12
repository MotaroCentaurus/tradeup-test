<?php

namespace App\DTO;

class ZipCodeRequestDTO
{
  private string $cep;

  public function __construct(string $cep)
  {
      $this->cep = $cep;
  }

  public function getCep(): string
  {
      return $this->cep;
  }
}