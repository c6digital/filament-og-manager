<?php

namespace C6Digital\OgManager;

use Spatie\LaravelPackageTools\Commands\InstallCommand;
use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

class OgManagerServiceProvider extends PackageServiceProvider
{
    public static string $name = 'og-manager';

    public function configurePackage(Package $package): void
    {
        $package->name(static::$name)
            ->hasInstallCommand(function (InstallCommand $command) {
                $command
                    ->publishMigrations()
                    ->askToRunMigrations();
            });

        if (file_exists($package->basePath('/../database/migrations'))) {
            $package->hasMigrations($this->getMigrations());
        }

        $package->hasViews('og-manager');
    }

    public function packageRegistered(): void {}

    /**
     * @return array<string>
     */
    protected function getMigrations(): array
    {
        return [
            'create_og_manager_meta_table',
        ];
    }
}
