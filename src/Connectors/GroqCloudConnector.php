<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Connectors;

use Saloon\Http\Auth\TokenAuthenticator;
use Saloon\Http\Connector;

/**
 * @psalm-api
 */
final class GroqCloudConnector extends Connector
{
    public function __construct(public readonly string $token)
    {
    }

    public function resolveBaseUrl(): string
    {
        return 'https://api.groq.com/openai/v1/';
    }

    protected function defaultAuth(): TokenAuthenticator
    {
        return new TokenAuthenticator($this->token);
    }
}
