<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Resources;

use FromHome\Corporate\Contract\Model\Division;
use Illuminate\Http\Resources\Json\JsonResource;

final class DivisionResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Division $division */
        $division = $this->resource;

        return $division->toArray();
    }
}
