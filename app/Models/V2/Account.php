<?php

namespace App\Models\V2;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Account extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id'
    ];

    public $timestamps = false;

    public function changeBalance(int $sum)
    {
        $this->balance += $sum;
    }
}
