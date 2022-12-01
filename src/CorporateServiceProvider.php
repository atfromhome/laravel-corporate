<?php

declare(strict_types=1);

namespace FromHome\Corporate;

use Spatie\LaravelPackageTools\Package;
use Spatie\LaravelPackageTools\PackageServiceProvider;

final class CorporateServiceProvider extends PackageServiceProvider
{
    public function configurePackage(Package $package): void
    {
        /*
         * This class is a Package Service Provider
         *
         * More info: https://github.com/spatie/laravel-package-tools
         */
        $package
            ->name('laravel-corporate')
            ->hasConfigFile()
            ->hasMigration('create_laravel-corporate_table');
    }
}
