<?php

namespace Webfox\OpenAI\Testing\Resources;

use Webfox\OpenAI\Contracts\Resources\ThreadsContract;
use Webfox\OpenAI\Resources\Threads;
use Webfox\OpenAI\Responses\StreamResponse;
use Webfox\OpenAI\Responses\Threads\Runs\ThreadRunResponse;
use Webfox\OpenAI\Responses\Threads\ThreadDeleteResponse;
use Webfox\OpenAI\Responses\Threads\ThreadResponse;
use Webfox\OpenAI\Testing\Resources\Concerns\Testable;

final class ThreadsTestResource implements ThreadsContract
{
    use Testable;

    public function resource(): string
    {
        return Threads::class;
    }

    public function create(array $parameters): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function createAndRun(array $parameters): ThreadRunResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function createAndRunStreamed(array $parameters): StreamResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function retrieve(string $id): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function modify(string $id, array $parameters): ThreadResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function delete(string $id): ThreadDeleteResponse
    {
        return $this->record(__FUNCTION__, func_get_args());
    }

    public function messages(): ThreadsMessagesTestResource
    {
        return new ThreadsMessagesTestResource($this->fake);
    }

    public function runs(): ThreadsRunsTestResource
    {
        return new ThreadsRunsTestResource($this->fake);
    }
}
