<?php

namespace App\Models\V2;

use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Record extends \App\Models\V1\Record
{
    protected $with = ['category'];

    public function category(): BelongsTo
    {
        return $this->belongsTo(Category::class);
    }
}
