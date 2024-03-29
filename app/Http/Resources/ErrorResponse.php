<?php

namespace App\Http\Resources;

use Illuminate\Http\JsonResponse;
use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ErrorResponse extends JsonResource
{
    /**
     * @var int
     */
    private int $errorCode;

    /**
     * @var string
     */
    private string $message;

    public function __construct($resource, string $message = '', int $errorCode = 422)
    {
        parent::__construct($resource);
        $this->message = $message;
        $this->errorCode = $errorCode;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => null,
            'message' => $this->message,
        ];
    }

    public function withResponse(Request $request, JsonResponse $response)
    {
        parent::withResponse($request, $response);
        $response->setStatusCode($this->errorCode);
    }
}
