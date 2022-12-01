<?php

declare(strict_types=1);

namespace FromHome\Corporate\Tests;

use Orchestra\Testbench\TestCase as Orchestra;
use FromHome\Corporate\CorporateServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;

final class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            fn (string $modelName) => 'FromHome\\Corporate\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        /*
        $migration = include __DIR__.'/../database/migrations/create_laravel-corporate_table.php.stub';
        $migration->up();
        */
    }

    protected function getPackageProviders($app)
    {
        return [
            CorporateServiceProvider::class,
        ];
    }
}
