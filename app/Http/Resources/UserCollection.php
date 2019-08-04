<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\ResourceCollection;
use App\Http\Resources\User as UserResource;

class UserCollection extends ResourceCollection
{
    public $collects = 'App\Http\Resources\User';

    /**
     * Transform the resource collection into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'data' => UserResource::collection($this->collection),
            'meta' => ['count' => $this->collection->count()] 
        ];
    }
}
