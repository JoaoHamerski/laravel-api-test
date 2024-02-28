<?php

namespace Tests\Unit;

use Illuminate\Support\Facades\Route;
use PHPUnit\Framework\TestCase;

class SaleTest extends TestCase
{
    /** @test */
    public function it_has_create_route()
    {
        $this->assertTrue(
            Route::has('api.sales.create')
        );
    }
}
