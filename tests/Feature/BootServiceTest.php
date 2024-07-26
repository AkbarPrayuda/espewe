<?php

namespace Tests\Feature;

use App\Services\BootService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BootServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testBootService(): void
    {
        $service1 = $this->app->make(BootService::class);
        $service2 = $this->app->make(BootService::class);

        $this->assertSame($service1, $service2);
    }

    public function testBootServiceIsInstanceOfBootService()
    {
        $service = $this->app->make(BootService::class);

        $this->assertInstanceOf(BootService::class, $service);
    }
}
