<?php

namespace Tests\Feature;

use App\Models\Boot;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class BootControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndex()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);
        $this->get('boot')->assertSeeText('Boot');
    }

    public function testCreate()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $this->get('boot/create')->assertSeeText('boot create');
    }

    public function testStore()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $this->post('boot', [
            'boot' => 'Ayam Goyeng',
            'user_id' => '1',
        ]);

        $this->assertDatabaseHas('boot', ['boot' => 'Ayam Goyeng']);
    }

    public function testShow()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);
        $boot = Boot::create([
            'boot' => 'Ayam',
            'user_id' => $user->id,
        ]);

        $this->get('boot/' . $boot['id'])->assertSee('Ayam');
    }

    public function testEdit()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);
        $boot = Boot::create([
            'boot' => 'Ayam Bakal',
            'user_id' => $user->id,
        ]);
        $this->get('boot/' . $boot['id'] . '/edit')->assertSee('Ayam Bakal');
    }

    public function testUpdate()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $boot = Boot::create([
            'boot' => 'ayam',
            'user_id' => '1'
        ]);

        $this->put('boot/' . $boot['id'], [
            'boot' => 'ikan'
        ]);

        $this->assertDatabaseHas('boot', ['boot' => 'ikan']);
    }

    public function testDelete()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $boot = Boot::create([
            'boot' => 'ayam',
            'user_id' => '1'
        ]);

        $this->delete('boot/' . $boot['id']);

        $this->assertDatabaseMissing('boot', ['boot' => 'ayam']);
    }
}
