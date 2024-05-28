<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class NoteResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */
    public function toArray(Request $request): array
    {
        //terminar los resourece y googlear como se hace un resouce con una tabla de rompimiento
        return [
            'note_one' => $this->note_one,
            'note_two' => $this->note_two,
            'note_three' => $this->note_three,
            'note_four' => $this->note_four,
            'note_avarege' => $this->note_avarege,
            'subject' => new SubjectResource($this->subject_id),
        ];
    }
}
