<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Action;

use FromHome\Corporate\Contract\Model\Employee;

interface CreateNewEmployee
{
    public function handle(array $attributes): Employee;
}
