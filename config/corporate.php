<?php

return [
    /**
     *  Indicated if branch table migration must be running
     */
    'running_branch_migration' => true,

    /**
     *  Indicated if position table migration must be running
     */
    'running_position_migration' => true,

    /**
     *  Indicated if division table migration must be running
     */
    'running_division_migration' => true,

    /**
     *  Indicated if employee table migration must be running
     */
    'running_employee_migration' => true,

    'model' => [
        /**
         * Branch model
         * ==========================================
         * This is a branch model class, cannot be null and must extend \FromHome\Corporate\Contract\Model\Branch
         */
        'branch' => FromHome\Corporate\Models\Branch::class,

        /**
         * Position model
         * ==========================================
         * This is a branch model class, cannot be null and must extend \FromHome\Corporate\Contract\Model\Position
         */
        'position' => FromHome\Corporate\Models\Position::class,

        /**
         * Division model
         * ==========================================
         * This is a branch model class, cannot be null and must extend \FromHome\Corporate\Contract\Model\Division
         */
        'division' => FromHome\Corporate\Models\Division::class,

        /**
         * Employee model
         * ==========================================
         * This is a branch model class, cannot be null and must extend \FromHome\Corporate\Contract\Model\Employee
         */
        'employee' => FromHome\Corporate\Models\Employee::class,
    ],
];
