<?php

namespace App\DTO;

class LocationRequestDTO
{
  private string $uf;
  private string $city;
  private string $street;

  public function __construct(string $uf, string $city, string $street)
  {
      $this->uf = $uf;
      $this->city = $city;
      $this->street = $street;
  }

  public function getUf(): string
  {
      return $this->uf;
  }

  public function getCity(): string
  {
      return $this->city;
  }

  public function getStreet(): string
  {
      return $this->street;
  }
}