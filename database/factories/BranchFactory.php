<?php

declare(strict_types=1);

namespace FromHome\Corporate\Database\Factories;

use FromHome\Corporate\Models\Branch;
use Illuminate\Database\Eloquent\Factories\Factory;

final class BranchFactory extends Factory
{
    protected $model = Branch::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
        ];
    }
}
