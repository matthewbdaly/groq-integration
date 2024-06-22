<?php

declare(strict_types=1);

namespace Matthewbdaly\GroqIntegration\DTO;

use ArrayAccess;
use ArrayIterator;
use Countable;
use IteratorAggregate;
use Traversable;

/**
 * Model collection class
 *
 * @psalm-immutable
 * @psalm-api
 */
final class ModelCollection implements ArrayAccess, Countable, IteratorAggregate
{
    public readonly string $object;

    public readonly array $data;

    public function __construct(
        string $object,
        array $data,
    ) {
        $this->object = $object;
        $this->data = array_map(function ($item) {
            return new Model(
                id: $item['id'],
                object: $item['object'],
                created: $item['created'],
                owned_by: $item['owned_by'],
                active: $item['active'],
                context_window: $item['context_window'],
            );
        }, $data);
    }

    public function offsetExists($offset): bool
    {
        return isset($this->data[$offset]);
    }

    public function offsetGet($offset): mixed
    {
        return $this->data[$offset];
    }

    public function offsetSet($offset, $value): void
    {
        // Not implemented as it's an immutable collection
    }

    public function offsetUnset($offset): void
    {
        // Not implemented as it's an immutable collection
    }

    public function count(): int
    {
        return count($this->data);
    }

    public function getIterator(): Traversable
    {
        return new ArrayIterator($this->data);
    }
}
