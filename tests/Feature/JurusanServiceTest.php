<?php

namespace Tests\Feature;

use App\Services\JurusanService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JurusanServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testJurusanService(): void
    {
        $service1 = $this->app->make(JurusanService::class);
        $service2 = $this->app->make(JurusanService::class);

        $this->assertSame($service1, $service2);
    }

    public function testJurusanServiceIsInstanceOfJurusanService()
    {
        $service = $this->app->make(JurusanService::class);

        $this->assertInstanceOf(JurusanService::class, $service);
    }
}
