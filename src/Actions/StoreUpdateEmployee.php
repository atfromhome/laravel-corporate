<?php

declare(strict_types=1);

namespace FromHome\Corporate\Actions;

use FromHome\Corporate\Contract\Action;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Events\EmployeeWasUpdated;

final class StoreUpdateEmployee implements Action\StoreUpdateEmployee
{
    public function handle(Employee $employee, array $attributes): Employee
    {
        $employee->fill($attributes)->save();

        event(new EmployeeWasUpdated($employee));

        return $employee;
    }
}
