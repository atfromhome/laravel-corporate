<?php

declare(strict_types=1);

namespace FromHome\Corporate\Contract\Model;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Concerns\HasUuids;

abstract class Employee extends Model
{
    use HasUuids;

    protected $casts = [
        'deactivated_at' => 'datetime',
    ];

    protected $appends = [
        'is_active',
    ];

    public function uniqueIds(): array
    {
        return ['uuid'];
    }

    public function getIsActiveAttribute(): bool
    {
        return $this->isActive();
    }

    public function isActive(): bool
    {
        return $this->getAttribute('deactivated_at') === null;
    }
}
