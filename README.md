# Aplicação PHP com ViaCEP

## Descrição

Esta aplicação PHP permite consultar endereços utilizando a API pública do [ViaCEP](https://viacep.com.br). Ela fornece dois endpoints que permitem:

1. Buscar informações de endereço por CEP.
2. Buscar endereços próximos com base em uma localidade específica.

A aplicação foi desenvolvida utilizando PHP 8.3 e pode ser executada em um ambiente Docker.

---

## Configuração e Execução

### Requisitos
- Docker e Docker Compose instalados na máquina.

### Passos para execução
1. Clone o repositório ou copie os arquivos para o seu ambiente local.
2. Certifique-se de que os arquivos estejam organizados conforme o seguinte:

```
- projeto/
  - composer.json
  - index.php
  - phpunit.xml
  - src/
  - tests/
```

3. Navegue até o diretório raiz do projeto e execute o seguinte comando para subir o container:

```bash
docker-compose up --build -d
```

4. Acesse a aplicação no navegador ou via ferramenta de testes como cURL ou Postman em:

```
http://localhost:8000
```

---

## Endpoints Disponíveis

### 1. Consultar Endereço por CEP

**Endpoint:**
```
GET /zip/{cep}
```

**Exemplo de requisição:**
```
GET http://localhost:8000/zip/08295305
```

**Exemplo de resposta:**
```json
{
  "cep": "08295-305",
  "logradouro": "Rua Lagoa Tai Grande",
  "complemento": "de 550/551 a 898/899",
  "bairro": "Itaquera",
  "localidade": "São Paulo",
  "uf": "SP",
  "ibge": "3550308",
  "gia": "1004",
  "ddd": "11",
  "siafi": "7107"
}
```

---

### 2. Consultar Endereços por Localidade

**Endpoint:**
```
GET /zip/{uf}/{cidade}/{logradouro}
```

**Exemplo de requisição:**
```
GET http://localhost:8000/zip/SP/São Paulo/Rua Lagoa Tai Grande
```

**Exemplo de resposta:**
```json
[
  {
    "cep": "08295-305",
    "logradouro": "Rua Lagoa Tai Grande",
    "complemento": "de 550/551 a 898/899",
    "bairro": "Itaquera",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
  },
  {
    "cep": "08290-425",
    "logradouro": "Rua Lagoa Tai Grande",
    "complemento": "de 900/901 ao fim",
    "bairro": "Vila Carmosina",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
  },
  {
    "cep": "08290-500",
    "logradouro": "Rua Lagoa Tai Grande",
    "complemento": "até 548/549",
    "bairro": "Itaquera",
    "localidade": "São Paulo",
    "uf": "SP",
    "ibge": "3550308",
    "gia": "1004",
    "ddd": "11",
    "siafi": "7107"
  }
]
```

---

## Testes

A aplicação inclui testes automatizados localizados no diretório `tests/`. Para executá-los, utilize o seguinte comando dentro do container PHP:

```bash
vendor/bin/pest
```

