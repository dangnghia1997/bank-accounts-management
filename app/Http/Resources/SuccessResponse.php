<?php
declare(strict_types=1);

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SuccessResponse extends JsonResource
{
    private array $data;

    public function __construct($resource, array $data = [])
    {
        parent::__construct($resource);
        $this->data = $data;
    }

    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'data' => $this->data
        ];
    }
}
