<?php

declare(strict_types=1);

namespace FromHome\Corporate;

use FromHome\Corporate\Http\Routes;
use FromHome\Corporate\Contract\Model\Branch;
use FromHome\Corporate\Contract\Model\Division;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Contract\Model\Position;

final class CorporateRegistrar
{
    /**
     * @var class-string<Branch>
     */
    private static string $branchModelClass;

    /**
     * @var class-string<Position>
     */
    private static string $positionModelClass;

    /**
     * @var class-string<Division>
     */
    private static string $divisionModelClass;

    /**
     * @var class-string<Employee>
     */
    private static string $employeeModelClass;

    private static bool $runningBranchMigration = true;

    private static bool $runningDivisionMigration = true;

    private static bool $runningEmployeeMigration = true;

    private static bool $runningPositionMigration = true;

    private function __construct()
    {
    }

    public static function fromConfig(array $config): void
    {
        self::runBranchMigration($config['running_branch_migration']);
        self::runPositionMigration($config['running_position_migration']);
        self::runDivisionMigration($config['running_division_migration']);
        self::runEmployeeMigration($config['running_employee_migration']);

        self::$branchModelClass = $config['model']['branch'];
        self::$positionModelClass = $config['model']['position'];
        self::$divisionModelClass = $config['model']['division'];
        self::$employeeModelClass = $config['model']['employee'];
    }

    public static function runningBranchMigration(): bool
    {
        return self::$runningBranchMigration;
    }

    public static function runBranchMigration(bool $boolean = true): bool
    {
        return self::$runningBranchMigration = $boolean;
    }

    public static function runningDivisionMigration(): bool
    {
        return self::$runningDivisionMigration;
    }

    public static function runDivisionMigration(bool $boolean = true): bool
    {
        return self::$runningDivisionMigration = $boolean;
    }

    public static function runningEmployeeMigration(): bool
    {
        return self::$runningEmployeeMigration;
    }

    public static function runEmployeeMigration(bool $boolean = true): bool
    {
        return self::$runningEmployeeMigration = $boolean;
    }

    public static function runningPositionMigration(): bool
    {
        return self::$runningPositionMigration;
    }

    public static function runPositionMigration(bool $boolean = true): bool
    {
        return self::$runningPositionMigration = $boolean;
    }

    /**
     * @return class-string<Employee>
     */
    public static function getEmployeeClass(): string
    {
        return self::$employeeModelClass;
    }

    /**
     * @return class-string<Branch>
     */
    public static function getBranchClass(): string
    {
        return self::$branchModelClass;
    }

    /**
     * @return class-string<Position>
     */
    public static function getPositionClass(): string
    {
        return self::$positionModelClass;
    }

    /**
     * @return class-string<Division>
     */
    public static function getDivisionClass(): string
    {
        return self::$divisionModelClass;
    }

    public static function getEmployeeModel(): Employee
    {
        return app(self::getEmployeeClass());
    }

    public static function routes(): void
    {
        Routes::route();
    }
}
