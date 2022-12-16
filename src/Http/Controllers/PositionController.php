<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Contracts\Support\Responsable;
use FromHome\Corporate\Contract\Repository\PositionRepository;
use FromHome\Corporate\Contract\Response\ShowPositionResponse;
use FromHome\Corporate\Contract\Response\FilterPositionResponse;

final class PositionController
{
    public function index(Request $request, PositionRepository $positionRepository): Responsable
    {
        return app(FilterPositionResponse::class, [
            'paginator' => $positionRepository->filter($request),
        ]);
    }

    public function show(string $positionId, PositionRepository $positionRepository): Responsable
    {
        $position = $positionRepository->findUsingId($positionId);

        \abort_if($position === null, 404);

        return app(ShowPositionResponse::class, [
            'position' => $position,
        ]);
    }
}
