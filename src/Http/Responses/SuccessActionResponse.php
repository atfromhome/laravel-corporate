<?php

declare(strict_types=1);

namespace FromHome\Corporate\Http\Responses;

use FromHome\Corporate\Contract\Response;

final class SuccessActionResponse extends Response\NoContentResponse implements
    Response\DeleteEmployeeResponse,
    Response\RestoreEmployeeResponse,
    Response\UpdateEmployeeResponse
{
}
