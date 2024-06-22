<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Connectors;

use Saloon\Http\Connector;

final class GroqCloudConnector extends Connector
{
    public function resolveBaseUrl(): string
    {
        return 'https://api.groq.com/openai/v1/';
    }
}
