<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Matthewbdaly\GroqIntegration\DTO\ModelCollection;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

/**
 * List models request
 *
 * @psalm-api
 */
final class ListModelsRequest extends Request
{
    protected Method $method = Method::GET;

    public function resolveEndpoint(): string
    {
        return '/models';
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();
        return new ModelCollection(
            object: $data['object'],
            data: $data["data"],
        );
    }
}
