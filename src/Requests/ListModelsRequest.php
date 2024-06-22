<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

/**
 * @psalm-api
 */
final class ListModelsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/models';
    }
}
