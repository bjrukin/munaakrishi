<?php

namespace Tests\Feature;

use Tests\TestCase;

class WorkingStrategyCopyTest extends TestCase
{
    public function test_distribute_step_uses_compact_description(): void
    {
        $copy = 'Through Munaa marts, retailers, and home delivery.';

        $this->assertStringContainsString($copy, file_get_contents(public_path('assets/js/data.js')));
        $this->assertStringContainsString($copy, file_get_contents(public_path('assets/js/main.js')));
    }
}
