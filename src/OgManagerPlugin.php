<?php

namespace C6Digital\OgManager;

use Filament\Contracts\Plugin;
use Filament\Panel;

class OgManagerPlugin implements Plugin
{
    public function getId(): string
    {
        return 'og-manager';
    }

    public function register(Panel $panel): void
    {
        $panel
            ->pages([
                Pages\SEO::class,
            ]);
    }

    public function boot(Panel $panel): void
    {
        //
    }

    public static function make(): static
    {
        return app(static::class);
    }

    public static function get(): static
    {
        /** @var static $plugin */
        $plugin = filament(app(static::class)->getId());

        return $plugin;
    }
}
