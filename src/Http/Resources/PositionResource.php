<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Resources;

use FromHome\Corporate\Contract\Model\Position;
use Illuminate\Http\Resources\Json\JsonResource;

final class PositionResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Position $position */
        $position = $this->resource;

        return $position->toArray();
    }
}
