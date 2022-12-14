<?php

declare(strict_types=1);

namespace FromHome\Corporate\Events;

use FromHome\Corporate\Contract\Model\Employee;

final class EmployeeWasCreated
{
    public function __construct(
        public readonly Employee $employee
    ) {
    }
}
