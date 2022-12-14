<?php

declare(strict_types=1);

namespace FromHome\Corporate\Events;

use FromHome\Corporate\Contract\Model\Employee;

final class EmployeeWasUpdated
{
    public function __construct(
        public readonly Employee $employee
    ) {
    }
}
