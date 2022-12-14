<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use FromHome\Corporate\Contract\Model\Employee;
use FromHome\Corporate\Contract\Action\CreateNewEmployee;
use FromHome\Corporate\Contract\Action\StoreUpdateEmployee;
use FromHome\Corporate\Contract\Request\StoreEmployeeRequest;
use FromHome\Corporate\Contract\Repository\EmployeeRepository;
use FromHome\Corporate\Contract\Request\UpdateEmployeeRequest;
use FromHome\Corporate\Contract\Response\ShowEmployeeResponse;
use FromHome\Corporate\Contract\Response\StoreEmployeeResponse;
use FromHome\Corporate\Contract\Response\DeleteEmployeeResponse;
use FromHome\Corporate\Contract\Response\FilterEmployeeResponse;
use FromHome\Corporate\Contract\Response\UpdateEmployeeResponse;
use FromHome\Corporate\Contract\Response\RestoreEmployeeResponse;

final class EmployeeController
{
    public function index(Request $request, EmployeeRepository $employeeRepository): Responsable
    {
        return app(FilterEmployeeResponse::class, [
            'paginator' => $employeeRepository->filter($request),
        ]);
    }

    public function store(StoreEmployeeRequest $request, CreateNewEmployee $newEmployee): Responsable
    {
        return app(StoreEmployeeResponse::class, [
            'employee' => $newEmployee->handle(
                $request->input()
            ),
        ]);
    }

    public function show(string $employeeId, EmployeeRepository $employeeRepository): Responsable
    {
        $employee = $employeeRepository->findUsingId($employeeId);

        \abort_if($employee === null, 404);

        return app(ShowEmployeeResponse::class, [
            'employee' => $employee,
        ]);
    }

    public function update(string $employeeId, UpdateEmployeeRequest $request, EmployeeRepository $employeeRepository, StoreUpdateEmployee $updateEmployee): Responsable
    {
        /** @var Employee $employee */
        $employee = $employeeRepository->findOrFailUsingId($employeeId);

        return app(UpdateEmployeeResponse::class, [
            'employee' => $updateEmployee->handle($employee, $request->input()),
        ]);
    }

    public function delete(string $employeeId, EmployeeRepository $employeeRepository, StoreUpdateEmployee $updateEmployee): Responsable
    {
        /** @var Employee $employee */
        $employee = $employeeRepository->findOrFailUsingId($employeeId);

        return app(DeleteEmployeeResponse::class, [
            'employee' => $updateEmployee->handle($employee, [
                'deactivated_at' => now(),
            ]),
        ]);
    }

    public function restore(string $employeeId, EmployeeRepository $employeeRepository, StoreUpdateEmployee $updateEmployee): Responsable
    {
        /** @var Employee $employee */
        $employee = $employeeRepository->findOrFailUsingId($employeeId);

        return app(RestoreEmployeeResponse::class, [
            'employee' => $updateEmployee->handle($employee, [
                'deactivated_at' => null,
            ]),
        ]);
    }
}
