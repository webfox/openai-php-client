<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Assistants;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{type: string, function: array{description: ?string, name: string, parameters: array<string, mixed>}}>
 */
final class AssistantResponseToolFunction implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{type: string, function: array{description: ?string, name: string, parameters: array<string, mixed>}}>
     */
    use ArrayAccessible;

    use Fakeable;

    private function __construct(
        public string $type,
        public AssistantResponseToolFunctionFunction $function,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{type: 'function', function: array{description: ?string, name: string, parameters: array<string, mixed>}}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['type'],
            AssistantResponseToolFunctionFunction::from($attributes['function']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'type' => $this->type,
            'function' => $this->function->toArray(),
        ];
    }
}
