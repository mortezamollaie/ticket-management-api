<?php

namespace App\ApiResponse;

use Mortezamollaie\TasksManagement\ApiResponse\ApiResponse;

class ApiResponseBuilder
{
    private ApiResponse $response;

    public function __construct()
    {
        $this->response = new ApiResponse();
    }

    public function withMessage(string $message): static
    {
        $this->response->setMessage($message);
        return $this;
    }

    public function withData(mixed $data): static
    {
        $this->response->setData($data);
        return $this;
    }

    public function withAppends(array $appends): static
    {
        $this->response->setAppends($appends);
        return $this;
    }

    public function withStatus(int $status): static
    {
        $this->response->setStatus($status);
        return $this;
    }

    public function build(): ApiResponse
    {
        return $this->response;
    }
}
