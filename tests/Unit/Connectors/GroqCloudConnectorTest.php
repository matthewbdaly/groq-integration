<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Connectors\GroqCloudConnector;
use Saloon\Http\Connector;

describe('Groq Cloud connector', function () {
    it('can be instantiated')->expect(new GroqCloudConnector())->toBeInstanceOf(Connector::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Connectors')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();
});
