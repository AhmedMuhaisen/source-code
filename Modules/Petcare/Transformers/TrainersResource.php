<?php

namespace Modules\Petcare\Transformers;

use Illuminate\Http\Resources\Json\JsonResource;

class TrainersResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param  \Illuminate\Http\Request
     * @return array
     */
    public function toArray($request)
    {
        return [
            'id'=>$this->id,
            'name'=>$this->user->name,
            'email' => $this->user->email,
            'phone'=>$this->user->phone,
            'city' => $this->user->city,
            'country' => $this->user->country,
            'state' => $this->user->state,
            'address' => $this->user->address,
            'image' => url('public/'.$this->image),
            'year_of_experience' => $this->year_of_experience,
            'zip_code' => $this->zip_code,
            'skills' => $this->skills_filter(),
            'rewards' => $this->rewards,
            'code' => $this->code,
            'description' => $this->description,


        ];
    }
}
