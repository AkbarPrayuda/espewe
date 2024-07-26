<?php

namespace Tests\Feature;

use App\Services\UserService;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class UserServiceTest extends TestCase
{
    /**
     * A basic feature test example.
     */
    public function testUserService(): void
    {
        $service1 = $this->app->make(UserService::class);
        $service2 = $this->app->make(UserService::class);

        $this->assertSame($service1, $service2);
    }

    public function testUserServiceIsInstanceOfUserService()
    {
        $service = $this->app->make(UserService::class);

        $this->assertInstanceOf(UserService::class, $service);
    }
}
