<?php

namespace Tests\Feature;

use App\Models\Menu;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class MenuControllerTest extends TestCase
{
    use RefreshDatabase;

    public function login()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->actingAs($user);
    }

    public function testIndex()
    {
        $this->login();

        $this->get('menu')->assertSeeText('menu');
    }

    public function testCreate()
    {
        $this->login();

        $this->get('menu/create')->assertSeeText('menu create');
    }

    public function testStore()
    {
        $this->login();

        $this->post('menu', [
            'nama_menu' => 'Ikan Goreng',
            'deskripsi' => '
                Lorem ipsum, dolor sit amet consectetur adipisicing elit. Provident, facere quisquam ipsum placeat suscipit est velit consectetur ut temporibus voluptates odio cumque, rerum optio magni et recusandae nisi. Explicabo, architecto!
            ',
            'boot_id' => '1',
            'harga' => 10000
        ]);

        $this->assertDatabaseHas('menu', ['nama_menu' => 'Ikan Goreng']);
    }

    public function testShow()
    {
        $this->login();
        $menu = Menu::create([
            'nama_menu' => 'ikan',
            'deskripsi' => 'ikanlalalalalalalala',
            'boot_id' => '1',
            'harga' => 10000,
        ]);

        $this->get('menu/' . $menu['id'])->assertSee('ikan');
    }

    public function testDelete()
    {
        $this->login();
        $menu = Menu::create([
            'nama_menu' => 'ikan',
            'deskripsi' => 'ikanlalalalalalalala',
            'boot_id' => '1',
            'harga' => 10000,
        ]);

        $this->delete('menu/' . $menu['id']);
        $this->assertDatabaseMissing('menu', ['nama_menu' => 'ikan']);
    }
}
