<?php

namespace C6Digital\OgManager\Models;

use Closure;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\MorphTo;
use Illuminate\Support\Facades\Storage;

/**
 * @property string $title
 * @property string|null $description
 * @property string|null $image
 * @property string|null $twitter_card_style
 */
class Meta extends Model
{
    protected $table = 'og_manager_meta';

    protected $guarded = [];

    protected static ?Closure $generateImageUrlUsing = null;

    public function metable(): MorphTo
    {
        return $this->morphTo();
    }

    public static function generateImageUrlUsing(Closure $callback): void
    {
        static::$generateImageUrlUsing = $callback;
    }

    public function getImageUrl(): ?string
    {
        if (! $this->image) {
            return null;
        }

        if (isset(static::$generateImageUrlUsing)) {
            return call_user_func(static::$generateImageUrlUsing, $this->image);
        }

        return Storage::url($this->image);
    }
}
