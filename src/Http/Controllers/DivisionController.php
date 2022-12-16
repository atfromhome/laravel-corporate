<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use FromHome\Corporate\Contract\Repository\DivisionRepository;
use FromHome\Corporate\Contract\Response\ShowDivisionResponse;
use FromHome\Corporate\Contract\Response\FilterDivisionResponse;

final class DivisionController
{
    public function index(Request $request, DivisionRepository $divisionRepository): Responsable
    {
        return app(FilterDivisionResponse::class, [
            'paginator' => $divisionRepository->filter($request),
        ]);
    }

    public function show(string $divisionId, DivisionRepository $divisionRepository): Responsable
    {
        $division = $divisionRepository->findUsingId($divisionId);

        \abort_if($division === null, 404);

        return app(ShowDivisionResponse::class, [
            'division' => $division,
        ]);
    }
}
