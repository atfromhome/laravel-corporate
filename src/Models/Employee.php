<?php

declare(strict_types=1);

namespace FromHome\Corporate\Models;

use FromHome\Corporate\Contract\Model;
use FromHome\Corporate\CorporateRegistrar;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

final class Employee extends Model\Employee
{
    public function branch(): BelongsTo
    {
        return $this->belongsTo(CorporateRegistrar::getBranchClass());
    }

    public function division(): BelongsTo
    {
        return $this->belongsTo(CorporateRegistrar::getDivisionClass());
    }

    public function position(): BelongsTo
    {
        return $this->belongsTo(CorporateRegistrar::getPositionClass());
    }
}
