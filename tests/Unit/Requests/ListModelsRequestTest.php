<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Requests\ListModelsRequest;
use Saloon\Http\Request;

describe('List models request', function () {
    it('can be instantiated')->expect(new ListModelsRequest())->toBeInstanceOf(Request::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Requests\ListModelsRequest')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();
});
