<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Saloon\Enums\Method;
use Saloon\Http\Request;

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
}
