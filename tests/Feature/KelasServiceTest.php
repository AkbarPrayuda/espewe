<?php

namespace Tests\Feature;

use App\Services\KelasService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelasServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testKelasService(): void
    {
        $service1 = $this->app->make(KelasService::class);
        $service2 = $this->app->make(KelasService::class);

        $this->assertSame($service1, $service2);
    }

    public function testKelasServiceIsInstanceOfKelasService()
    {
        $service = $this->app->make(KelasService::class);

        $this->assertInstanceOf(KelasService::class, $service);
    }
}
