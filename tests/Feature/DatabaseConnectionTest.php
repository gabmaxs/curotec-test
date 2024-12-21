<?php

namespace Tests\Feature;

use Illuminate\Support\Facades\DB;
use Tests\TestCase;

class DatabaseConnectionTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function test_database_connection(): void
    {
        try {
            DB::select('SELECT 1');
            $this->assertTrue(true, 'Database connection is successful.');
        } catch (\Exception $e) {
            $this->fail('Failed to connect to the database: ' . $e->getMessage());
        }
    }
}
