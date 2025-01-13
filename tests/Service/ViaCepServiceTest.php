<?php

use App\Service\ViaCepService;
use Mockery as ServiceMock;

it('can fetch address details by zip code', function () {
    $service = ServiceMock::mock(ViaCepService::class);
    $service->shouldReceive('fetchAddressByCep')
            ->with('01001000')
            ->andReturn(['logradouro' => 'Praça da Sé']);

    $result = $service->fetchAddressByCep('01001000');
    expect($result['logradouro'])->toBe('Praça da Sé');
});
