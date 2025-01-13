<?php

namespace App\DTO;

/**
 * This class aims to
 * request a Address
 * using UF, City and Street
 */
class LocationRequestDTO
{
  private string $uf;
  private string $city;
  private string $street;

  /**
   * Construct DTO
   *
   * @param string $uf
   * @param string $city
   * @param string $street
   */
  public function __construct(string $uf, string $city, string $street)
  {
      $this->uf = $uf;
      $this->city = $city;
      $this->street = $street;
  }

  /**
   * Return UF
   *
   * @return string
   */
  public function getUf(): string
  {
      return $this->uf;
  }

  /**
   * Return City
   *
   * @return string
   */
  public function getCity(): string
  {
      return $this->city;
  }

  public function getStreet(): string
  {
      return $this->street;
  }
}