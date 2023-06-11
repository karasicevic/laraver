<?php

namespace App\Http\Resources;

use Illuminate\Http\Request;
use Illuminate\Http\Resources\Json\JsonResource;

class TaskResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @return array<string, mixed>
     */

     public static $wrap ='task';

    public function toArray($request): array
    {
        return[
            'title' => $this->resource->title,
            'description'=>$this->resource->description,
            'done' => $this->resource->done,
            'user_id' => new UserResource($this->resource->user),
            'project_id' =>new ProjectResource($this->resource->project),
        ];
    }
}
