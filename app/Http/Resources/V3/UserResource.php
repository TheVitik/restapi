<?php

namespace App\Http\Resources\V3;

use App\Http\Resources\UserAccountResource;
use App\Models\V2\Account;
use Illuminate\Http\Resources\Json\JsonResource;

class UserResource extends JsonResource
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
            'id' => $this->id,
            'account' => new UserAccountResource(Account::where('user_id', auth()->id())->first())
        ];
    }
}
