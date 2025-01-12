<?php

namespace App\Service;

use GuzzleHttp\Client;
use GuzzleHttp\Exception\BadResponseException;
use GuzzleHttp\Exception\RequestException;
use GuzzleHttp\RequestOptions;
use Psr\Http\Message\ResponseInterface;

class ViaCepService implements CepServiceInterface
{
    private const BASE_URL = 'https://viacep.com.br/ws/';

    private Client $httpClient;

    public function __construct()
    {
        $this->httpClient = new Client();
    }

    public function getAddressByZipCode(ViaCEPRequestDTO $request): ViaCEPResponseDTO
    {
        $cep = $request->getCep();

        if (!preg_match('/^\d{8}$/', $cep)) {
            throw new \InvalidArgumentException('O CEP deve conter exatamente 8 dígitos.');
        }

        $url = self::BASE_URL . "$cep/json/";

        try {
            $response = $this->httpClient->request('GET', $url);
            $data = json_decode($response->getBody(), true);

            if (isset($data['erro']) && $data['erro'] === true) {
                throw new \RuntimeException('CEP não encontrado.');
            }

            return new ViaCEPResponseDTO(
                $data['cep'] ?? null,
                $data['logradouro'] ?? null,
                $data['complemento'] ?? null,
                $data['bairro'] ?? null,
                $data['localidade'] ?? null,
                $data['uf'] ?? null,
                $data['ibge'] ?? null,
                $data['gia'] ?? null,
                $data['ddd'] ?? null,
                $data['siafi'] ?? null
            );
        } catch (RequestException $e) {
            throw new \RuntimeException('Erro ao consultar o serviço ViaCEP: ' . $e->getMessage());
        }
    }

    public function getAddressByLocation(string $uf, string $city, string $street): array
    {
        if (strlen($city) < 3 || strlen($street) < 3) {
            throw new \InvalidArgumentException('Cidade e logradouro devem ter pelo menos 3 caracteres.');
        }

        $url = self::BASE_URL . "$uf/$city/$street/json/";

        try {
            $response = $this->httpClient->request('GET', $url);
            $data = json_decode($response->getBody(), true);

            if (!is_array($data) || empty($data)) {
                throw new \RuntimeException('Endereço não encontrado.');
            }

            return array_map(function ($item) {
                return new ViaCEPResponseDTO(
                    $item['cep'] ?? null,
                    $item['logradouro'] ?? null,
                    $item['complemento'] ?? null,
                    $item['bairro'] ?? null,
                    $item['localidade'] ?? null,
                    $item['uf'] ?? null,
                    $item['ibge'] ?? null,
                    $item['gia'] ?? null,
                    $item['ddd'] ?? null,
                    $item['siafi'] ?? null
                );
            }, $data);
        } catch (RequestException $e) {
            throw new \RuntimeException('Erro ao consultar o serviço ViaCEP: ' . $e->getMessage());
        }
    }
}
