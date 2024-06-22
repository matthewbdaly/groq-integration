<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Matthewbdaly\GroqIntegration\DTO\Model;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Http\Response;

final class RetrieveModelRequest extends Request
{
    protected Method $method = Method::GET;

    public function __construct(public readonly string $model)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/models/' . $this->model;
    }

    public function createDtoFromResponse(Response $response): mixed
    {
        $data = $response->json();
        return new Model(
            id: $data['id'],
            object: $data['object'],
            created: $data['created'],
            owned_by: $data['owned_by'],
            active: $data['active'],
            context_window: $data['context_window'],
        );
    }
}
