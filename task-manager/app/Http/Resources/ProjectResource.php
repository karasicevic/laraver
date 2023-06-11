<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class ProjectResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public static $wrap ='project';

    public function toArray( $request): array
    {
        return[
            'title' => $this->resource->title,
            'description'=>$this->resource->description,
            'date'=>$this->resource->date

        ];
    }
}
