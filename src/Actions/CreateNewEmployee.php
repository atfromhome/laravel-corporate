<?php

declare(strict_types=1);

namespace FromHome\Corporate\Actions;

use FromHome\Corporate\Contract\Action;
use FromHome\Corporate\CorporateRegistrar;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Events\EmployeeWasCreated;

final class CreateNewEmployee implements Action\CreateNewEmployee
{
    public function handle(array $attributes): Employee
    {
        /** @var Employee $employee */
        $employee = CorporateRegistrar::getEmployeeModel()->newQuery()->forceCreate(
            $attributes
        );

        event(new EmployeeWasCreated($employee));

        return $employee;
    }
}
