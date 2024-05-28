<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class SubjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        return [
            'id' => $this->id,
            'Subject' => $this->subject,
            'Time_per_week' => $this->time_per_week,
            'Teacher_asigned' => new UserResource($this->whenLoaded('Teacher_asigned')),
        ];
    }
}
