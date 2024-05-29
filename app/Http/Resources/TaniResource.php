<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaniResource extends JsonResource
{
    public $message;
    public $meta;
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public function __construct($message, $resource, $meta)
    {
        parent::__construct($resource);
        $this->message = $message;
        $this->meta = $meta;
    }

    public function toArray(Request $request): array
    {
        return [
            'message' => $this->message,
            'data' => $this->resource,
            'meta' => $this->meta
        ];
    }
}
