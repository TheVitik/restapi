<?php

namespace App\Http\Resources;

use App\Models\V2\Category;
use App\Models\V2\User;
use Illuminate\Http\Resources\Json\JsonResource;

class RecordResource extends JsonResource
{
    /**
     * Transform the resource into an array.
     *
     * @param \Illuminate\Http\Request $request
     * @return array|\Illuminate\Contracts\Support\Arrayable|\JsonSerializable
     */
    public function toArray($request)
    {
        return [
            'id'=> $this->id,
            'user' => User::find($this->user_id),
            'category' => Category::find($this->category_id),
            'sum' => $this->sum,
            'create_date' => $this->created_at
        ];
    }
}
