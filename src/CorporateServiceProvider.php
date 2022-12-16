<?php

declare(strict_types=1);

namespace FromHome\Corporate;

use Spatie\LaravelPackageTools\Package;
use FromHome\Corporate\Actions\CreateNewEmployee;
use FromHome\Corporate\Actions\StoreUpdateEmployee;
use FromHome\Corporate\Repositories\BranchRepository;
use Spatie\LaravelPackageTools\PackageServiceProvider;
use FromHome\Corporate\Repositories\DivisionRepository;
use FromHome\Corporate\Repositories\EmployeeRepository;
use FromHome\Corporate\Repositories\PositionRepository;
use FromHome\Corporate\Http\Responses\ShowBranchResponse;
use FromHome\Corporate\Http\Requests\StoreEmployeeRequest;
use FromHome\Corporate\Http\Responses\FilterBranchResponse;
use FromHome\Corporate\Http\Responses\ShowDivisionResponse;
use FromHome\Corporate\Http\Responses\ShowEmployeeResponse;
use FromHome\Corporate\Http\Responses\ShowPositionResponse;
use FromHome\Corporate\Http\Responses\SuccessActionResponse;
use FromHome\Corporate\Http\Responses\FilterDivisionResponse;
use FromHome\Corporate\Http\Responses\FilterEmployeeResponse;
use FromHome\Corporate\Http\Responses\FilterPositionResponse;

final class CorporateServiceProvider extends PackageServiceProvider
{
    public function packageRegistered(): void
    {
        CorporateRegistrar::fromConfig(
            \config('corporate')
        );

        $this->bindingInterface();
    }

    public function configurePackage(Package $package): void
    {
        $package
            ->name('laravel-corporate')
            ->hasConfigFile()
            ->hasMigration('create_laravel-corporate_table');

        if ($this->app->runningUnitTests()) {
            $package->hasRoute('api');
        }
    }

    private function bindingInterface(): void
    {
        $this->app->bind(Contract\Repository\EmployeeRepository::class, EmployeeRepository::class);
        $this->app->bind(Contract\Repository\BranchRepository::class, BranchRepository::class);
        $this->app->bind(Contract\Repository\DivisionRepository::class, DivisionRepository::class);
        $this->app->bind(Contract\Repository\PositionRepository::class, PositionRepository::class);

        $this->app->bind(Contract\Action\CreateNewEmployee::class, CreateNewEmployee::class);
        $this->app->bind(Contract\Action\StoreUpdateEmployee::class, StoreUpdateEmployee::class);

        $this->app->bind(Contract\Response\ShowEmployeeResponse::class, ShowEmployeeResponse::class);
        $this->app->bind(Contract\Response\StoreEmployeeResponse::class, ShowEmployeeResponse::class);
        $this->app->bind(Contract\Response\UpdateEmployeeResponse::class, SuccessActionResponse::class);
        $this->app->bind(Contract\Response\DeleteEmployeeResponse::class, SuccessActionResponse::class);
        $this->app->bind(Contract\Response\RestoreEmployeeResponse::class, SuccessActionResponse::class);
        $this->app->bind(Contract\Response\FilterEmployeeResponse::class, FilterEmployeeResponse::class);

        $this->app->bind(Contract\Response\ShowBranchResponse::class, ShowBranchResponse::class);
        $this->app->bind(Contract\Response\StoreBranchResponse::class, ShowBranchResponse::class);
        $this->app->bind(Contract\Response\FilterBranchResponse::class, FilterBranchResponse::class);

        $this->app->bind(Contract\Response\ShowDivisionResponse::class, ShowDivisionResponse::class);
        $this->app->bind(Contract\Response\StoreDivisionResponse::class, ShowDivisionResponse::class);
        $this->app->bind(Contract\Response\FilterDivisionResponse::class, FilterDivisionResponse::class);

        $this->app->bind(Contract\Response\ShowPositionResponse::class, ShowPositionResponse::class);
        $this->app->bind(Contract\Response\StorePositionResponse::class, ShowPositionResponse::class);
        $this->app->bind(Contract\Response\FilterPositionResponse::class, FilterPositionResponse::class);

        $this->app->bind(Contract\Request\StoreEmployeeRequest::class, StoreEmployeeRequest::class);
        $this->app->bind(Contract\Request\UpdateEmployeeRequest::class, StoreEmployeeRequest::class);
    }
}
