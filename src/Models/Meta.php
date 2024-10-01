<?php

namespace C6Digital\OgManager\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

class Meta extends Model
{
    protected $table = 'og_manager_meta';

    protected $guarded = [];

    public function metable(): MorphTo
    {
        return $this->morphTo();
    }

    public function getImageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }

        return Storage::url($this->image);
    }
}
