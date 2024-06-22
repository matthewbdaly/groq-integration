<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Connectors\GroqCloudConnector;
use Matthewbdaly\GroqIntegration\Requests\ListModelsRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

describe('List models request', function () {
    it('can be instantiated')->expect(new ListModelsRequest())->toBeInstanceOf(Request::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Requests\ListModelsRequest')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();

    it('can make a request', function () {
        $mockClient = new MockClient([
            ListModelsRequest::class => MockResponse::fixture('groqcloud/list-models'),
        ]);
        $connector = new GroqCloudConnector(getenv('GROQ_CLOUD_API_KEY'));
        $connector->withMockClient($mockClient);
        $request = new ListModelsRequest();
        $connector->send($request);
        $mockClient->assertSent(ListModelsRequest::class);
        $mockClient->assertSentCount(1);
    });
});
