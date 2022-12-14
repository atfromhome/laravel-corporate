<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Request;

use Illuminate\Foundation\Http\FormRequest;

/**
 * @mixin FormRequest
 */
interface StoreEmployeeRequest
{
    public function rules(): array;
}
