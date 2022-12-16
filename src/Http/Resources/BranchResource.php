<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Resources;

use FromHome\Corporate\Contract\Model\Branch;
use Illuminate\Http\Resources\Json\JsonResource;

final class BranchResource extends JsonResource
{
    public function toArray($request): array
    {
        /** @var Branch $branch */
        $branch = $this->resource;

        return $branch->toArray();
    }
}
