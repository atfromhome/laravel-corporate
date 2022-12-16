<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use FromHome\Corporate\Contract\Repository\BranchRepository;
use FromHome\Corporate\Contract\Response\ShowBranchResponse;
use FromHome\Corporate\Contract\Response\FilterBranchResponse;

final class BranchController
{
    public function index(Request $request, BranchRepository $branchRepository): Responsable
    {
        return app(FilterBranchResponse::class, [
            'paginator' => $branchRepository->filter($request),
        ]);
    }

    public function show(string $branchId, BranchRepository $branchRepository): Responsable
    {
        $branch = $branchRepository->findUsingId($branchId);

        \abort_if($branch === null, 404);

        return app(ShowBranchResponse::class, [
            'branch' => $branch,
        ]);
    }
}
