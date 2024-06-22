<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Matthewbdaly\GroqIntegration\DTO\Model;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

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

    public function createDtoFromResponse(Response $response): mixed
    {
        return array_map(function ($item) {
            return new Model(
                id: $item['id'],
                object: $item['object'],
                created: $item['created'],
                owned_by: $item['owned_by'],
                active: $item['active'],
                context_window: $item['context_window'],
            );
        }, $response->json()['data']);
    }
}
