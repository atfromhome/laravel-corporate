<?php

declare(strict_types=1);

namespace FromHome\Corporate\Database\Factories;

use FromHome\Corporate\Models\Division;
use Illuminate\Database\Eloquent\Factories\Factory;

final class DivisionFactory extends Factory
{
    protected $model = Division::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
        ];
    }
}
