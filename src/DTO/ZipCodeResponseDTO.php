<?php

namespace App\DTO;

class ZipCodeResponseDTO
{
  private ?string $cep;
  private ?string $logradouro;
  private ?string $complemento;
  private ?string $bairro;
  private ?string $localidade;
  private ?string $uf;
  private ?string $ibge;
  private ?string $gia;
  private ?string $ddd;
  private ?string $siafi;

  public function __construct(
      ?string $cep,
      ?string $logradouro,
      ?string $complemento,
      ?string $bairro,
      ?string $localidade,
      ?string $uf,
      ?string $ibge,
      ?string $gia,
      ?string $ddd,
      ?string $siafi
  ) {
      $this->cep = $cep;
      $this->logradouro = $logradouro;
      $this->complemento = $complemento;
      $this->bairro = $bairro;
      $this->localidade = $localidade;
      $this->uf = $uf;
      $this->ibge = $ibge;
      $this->gia = $gia;
      $this->ddd = $ddd;
      $this->siafi = $siafi;
  }

  public function toArray(): array
  {
      return [
          'cep' => $this->cep,
          'logradouro' => $this->logradouro,
          'complemento' => $this->complemento,
          'bairro' => $this->bairro,
          'localidade' => $this->localidade,
          'uf' => $this->uf,
          'ibge' => $this->ibge,
          'gia' => $this->gia,
          'ddd' => $this->ddd,
          'siafi' => $this->siafi,
      ];
  }
}