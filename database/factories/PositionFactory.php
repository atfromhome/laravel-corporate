<?php

declare(strict_types=1);

namespace FromHome\Corporate\Database\Factories;

use FromHome\Corporate\Models\Position;
use Illuminate\Database\Eloquent\Factories\Factory;

final class PositionFactory extends Factory
{
    protected $model = Position::class;

    public function definition(): array
    {
        return [
            'name' => $this->faker->sentence(2),
        ];
    }
}
