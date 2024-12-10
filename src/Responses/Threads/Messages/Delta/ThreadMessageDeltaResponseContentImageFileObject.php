<?php

declare(strict_types=1);

namespace Webfox\AzureOpenAI\Responses\Threads\Messages\Delta;

use Webfox\AzureOpenAI\Contracts\ResponseContract;
use Webfox\AzureOpenAI\Responses\Concerns\ArrayAccessible;
use Webfox\AzureOpenAI\Responses\Threads\Messages\ThreadMessageResponseContentImageFile;
use Webfox\AzureOpenAI\Testing\Responses\Concerns\Fakeable;

/**
 * @implements ResponseContract<array{index: int, type: 'image_file', image_file: array{file_id: string, detail?: string}}>
 */
final class ThreadMessageDeltaResponseContentImageFileObject implements ResponseContract
{
    /**
     * @use ArrayAccessible<array{index: int, type: 'image_file', image_file: array{file_id: string, detail?: string}}>
     */
    use ArrayAccessible;

    use Fakeable;

    /**
     * @param  'image_file'  $type
     */
    private function __construct(
        public int $index,
        public string $type,
        public ThreadMessageResponseContentImageFile $imageFile,
    ) {}

    /**
     * Acts as static factory, and returns a new Response instance.
     *
     * @param  array{index: int, type: 'image_file', image_file: array{file_id: string, detail?: string}}  $attributes
     */
    public static function from(array $attributes): self
    {
        return new self(
            $attributes['index'],
            $attributes['type'],
            ThreadMessageResponseContentImageFile::from($attributes['image_file']),
        );
    }

    /**
     * {@inheritDoc}
     */
    public function toArray(): array
    {
        return [
            'index' => $this->index,
            'type' => $this->type,
            'image_file' => $this->imageFile->toArray(),
        ];
    }
}
