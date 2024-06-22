<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\Requests;

use Saloon\Contracts\Body\HasBody;
use Saloon\Enums\Method;
use Saloon\Http\Request;
use Saloon\Traits\Body\HasJsonBody;

/**
 * Chat completion request
 *
 * @psalm-api
 */
final class ChatCompletionRequest extends Request implements HasBody
{
    use HasJsonBody;

    protected Method $method = Method::POST;

    public function __construct(private readonly string $model, private readonly array $messages)
    {
    }

    public function resolveEndpoint(): string
    {
        return '/chat/completions';
    }

    protected function defaultBody(): array
    {
        return [
            'model' => $this->model,
            'messages' => $this->messages,
        ];
    }
}
