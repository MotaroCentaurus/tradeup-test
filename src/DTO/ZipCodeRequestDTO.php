<?php

namespace App\DTO;

/**
 * This class aims
 * to be used in order
 * to get an address by a
 * Zip Code
 */
class ZipCodeRequestDTO
{
  private string $cep;

  /**
   * Construct DTO
   *
   * @param string $cep
   */
  public function __construct(string $cep)
  {
      $this->cep = $cep;
  }

  /**
   * Return Zip Code
   *
   * @return string
   */
  public function getCep(): string
  {
      return $this->cep;
  }
}