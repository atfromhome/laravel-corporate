<?php

declare(strict_types=1);

namespace FromHome\Corporate\Tests;

use Illuminate\Database\Eloquent\Model;
use Orchestra\Testbench\TestCase as Orchestra;
use FromHome\Corporate\CorporateServiceProvider;
use Illuminate\Database\Eloquent\Factories\Factory;
use FromHome\Corporate\Database\Factories\BranchFactory;
use FromHome\Corporate\Database\Factories\DivisionFactory;
use FromHome\Corporate\Database\Factories\PositionFactory;

abstract class TestCase extends Orchestra
{
    protected function setUp(): void
    {
        parent::setUp();

        Factory::guessFactoryNamesUsing(
            static fn (string $modelName) => 'FromHome\\Corporate\\Database\\Factories\\' . class_basename($modelName) . 'Factory'
        );
    }

    public function getEnvironmentSetUp($app): void
    {
        config()->set('database.default', 'testing');

        $migration = include __DIR__ . '/../database/migrations/create_corporate_table.php.stub';

        $migration->up();
    }

    protected function getPackageProviders($app): array
    {
        return [
            CorporateServiceProvider::class,
        ];
    }

    /**
     * @return array<Model>
     */
    protected function makeOneModelFactory(): array
    {
        $division = DivisionFactory::new()->createOne();
        $position = PositionFactory::new()->createOne();
        $branch = BranchFactory::new()->createOne();

        return [$division, $position, $branch];
    }
}
