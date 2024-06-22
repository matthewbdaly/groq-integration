<?php

declare(strict_types=1);

use Matthewbdaly\GroqIntegration\Connectors\GroqCloudConnector;
use Matthewbdaly\GroqIntegration\Requests\ChatCompletionRequest;
use Saloon\Http\Faking\MockClient;
use Saloon\Http\Faking\MockResponse;
use Saloon\Http\Request;

describe('Chat completion request', function () {
    it('can be instantiated')->expect(new ChatCompletionRequest("gemma-7b-it", []))->toBeInstanceOf(Request::class);

    arch('src')
        ->expect('Matthewbdaly\GroqIntegration\Requests\ChatCompletionRequest')
        ->toUseStrictTypes()
        ->toBeClasses()
        ->toBeFinal();

    it('can make a request', function () {
        $mockClient = new MockClient([
            ChatCompletionRequest::class => MockResponse::fixture('groqcloud/chat-completion'),
        ]);
        $connector = new GroqCloudConnector(getenv('GROQ_CLOUD_API_KEY'));
        $connector->withMockClient($mockClient);
        $messages = [[
            "role" => "user",
            "content" => "What is a large language model in layman's terms?",
        ]];
        $request = new ChatCompletionRequest("gemma-7b-it", $messages);
        $connector->send($request);
        $mockClient->assertSent(ChatCompletionRequest::class);
        $mockClient->assertSentCount(1);
    });
});
