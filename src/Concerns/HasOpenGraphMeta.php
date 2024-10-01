<?php

namespace C6Digital\OgManager\Concerns;

use C6Digital\OgManager\Models\Meta;
use Illuminate\Database\Eloquent\Relations\MorphOne;

trait HasOpenGraphMeta
{
    public function openGraphMeta(): MorphOne
    {
        return $this->morphOne(Meta::class, 'metable');
    }
}
