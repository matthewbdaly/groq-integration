<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\DTO;

/**
 * Model class
 *
 * @psalm-immutable
 */
final class Model
{
    public function __construct(
        public readonly string $id,
        public readonly string $object,
        public readonly int $created,
        public readonly string $owned_by,
        public readonly bool $active,
        public readonly int $context_window
    ) {
    }
}
