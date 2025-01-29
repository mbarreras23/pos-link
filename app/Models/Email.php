<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Database\Eloquent\SoftDeletes;

class Email extends Model
{
    use SoftDeletes;

    protected $fillable = [
        "emailable_id",
        "emailable_type",
        "email"
    ];

    // Relationships
    public function emailable(): MorphTo
    {
        return $this->morphTo();
    }
}
