<?php

namespace App\Http\Resources;

use Illuminate\Http\Resources\Json\JsonResource;

class MyJobsResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'description'=> $this->description,
            'location'=> $this->location,
            'status'=> $this->status,
            'title'=> $this->title,
            'contract_type'=> $this->contract_type,
            'user'=>$this->user
        ];
    }
}
