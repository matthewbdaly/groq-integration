<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Connectors\GroqCloudConnector;
use Matthewbdaly\GroqIntegration\Requests\RetrieveModelRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

describe('Retrieve model request', function () {
    it('can be instantiated')->expect(new RetrieveModelRequest("gemma-7b-it"))->toBeInstanceOf(Request::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Requests\ListModelsRequest')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();

    it('can make a request', function () {
        $mockClient = new MockClient([
            RetrieveModelRequest::class => MockResponse::fixture('groqcloud/retrieve-model'),
        ]);
        $connector = new GroqCloudConnector(getenv('GROQ_CLOUD_API_KEY'));
        $connector->withMockClient($mockClient);
        $request = new RetrieveModelRequest("gemma-7b-it");
        $connector->send($request);
        $mockClient->assertSent(RetrieveModelRequest::class);
        $mockClient->assertSentCount(1);
    });
});
