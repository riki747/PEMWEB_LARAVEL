<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProductResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

    public $status;
    public $message;
    public $resource;

    // membuat constructor untuk menginisialisasi status, message, dan resource
    public function __construct($resource, $status = 200, $message = 'Success')
    {
        parent::__construct($resource);
        $this->status = $status;
        $this->message = $message;
    }

    // mengoverride method toArray untuk mengembalikan array dengan format yang diinginkan
    public function toArray(Request $request): array
    {
        return [
            'success' => $this->status,
            'message' => $this->message,
            'data' => $this->resource
        ];
    }
}
