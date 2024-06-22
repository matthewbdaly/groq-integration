<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Connectors\GroqCloudConnector;
use Saloon\Http\Connector;

describe('Groq Cloud connector', function () {
    it('can be instantiated')->expect(new GroqCloudConnector(getenv('GROQ_CLOUD_API_KEY')))->toBeInstanceOf(Connector::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Connectors')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();
});
