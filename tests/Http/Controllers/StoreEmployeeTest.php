<?php

declare(strict_types=1);

namespace FromHome\Corporate\Tests\Http\Controllers;

use FromHome\Corporate\Tests\TestCase;
use FromHome\Corporate\CorporateRegistrar;

final class StoreEmployeeTest extends TestCase
{
    public function test_can_store_new_employee(): void
    {
        list($division, $position, $branch) = $this->makeOneModelFactory();

        $response = $this->postJson('/employee', $data = [
            'name' => 'Foo bar name',
            'email' => 'foo@bar.com',
            'branch_id' => $branch->getKey(),
            'division_id' => $division->getKey(),
            'position_id' => $position->getKey(),
        ]);

        $response->assertSuccessful();

        $this->assertDatabaseHas(CorporateRegistrar::getEmployeeClass(), $data);
    }
}
