<?php

namespace Tests\Feature;

use App\Services\MenuService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testMenuService(): void
    {
        $service1 = $this->app->make(MenuService::class);
        $service2 = $this->app->make(MenuService::class);

        $this->assertSame($service1, $service2);
    }

    public function testMenuServiceIsInstanceOfMenuService()
    {
        $service = $this->app->make(MenuService::class);

        $this->assertInstanceOf(MenuService::class, $service);
    }
}
