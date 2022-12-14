<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Requests;

use Illuminate\Validation\Rule;
use FromHome\Corporate\Contract\Request;
use FromHome\Corporate\CorporateRegistrar;
use Illuminate\Foundation\Http\FormRequest;

final class StoreEmployeeRequest extends FormRequest implements Request\StoreEmployeeRequest, Request\UpdateEmployeeRequest
{
    public function rules(): array
    {
        return [
            'name' => 'required',
            'email' => [
                'required', Rule::unique(CorporateRegistrar::getEmployeeClass()),
            ],
            'branch_id' => [
                'required', Rule::exists(CorporateRegistrar::getBranchClass(), 'id'),
            ],
            'phone' => [
                'nullable', Rule::unique(CorporateRegistrar::getEmployeeClass()),
            ],
            'phone_country' => [
                'nullable', 'string', 'max:2',
            ],
            'division_id' => [
                'required', Rule::exists(CorporateRegistrar::getDivisionClass(), 'id'),
            ],
            'position_id' => [
                'required', Rule::exists(CorporateRegistrar::getPositionClass(), 'id'),
            ],
        ];
    }
}
