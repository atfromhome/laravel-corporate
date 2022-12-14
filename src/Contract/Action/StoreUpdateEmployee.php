<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Action;

use FromHome\Corporate\Contract\Model\Employee;

interface StoreUpdateEmployee
{
    public function handle(Employee $employee, array $attributes): Employee;
}
