# Aplicação PHP com ViaCEP

## Descrição

Esta aplicação PHP permite consultar endereços utilizando a API pública do [ViaCEP](https://viacep.com.br). Ela fornece dois endpoints que permitem:

1. Buscar informações de endereço por CEP.
2. Buscar endereços próximos com base em uma localidade específica.

A aplicação foi desenvolvida utilizando PHP 8.3 e pode ser executada em um ambiente Docker.
O frondend usa VueJS

---

## Configuração e Execução

### Requisitos
- Git, Docker e Docker Compose instalados na máquina. E ter as portas 8000 e 3000 livres.

### Passos para execução
1. Clone o repositório ou copie os arquivos para o seu ambiente local.
```bash
git clone https://github.com/MotaroCentaurus/tradeup-test.git
```

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

4. Acesse a aplicação no navegador ou via ferramenta de testes como cURL, Postman ou Insomnia em:

```
http://localhost:8000
```

5. O frontend vai rodar na porta 3000 do docker que estará vinculada à porta 3000 do localhost:

```
http://localhost:3000
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

A aplicação inclui testes automatizados localizados no diretório `tests/`. Para executá-los, utilize o seguinte comando na linha de comando no terminal:

```bash
docker exec -it php_via_cep bash
vendor/bin/pest
```

