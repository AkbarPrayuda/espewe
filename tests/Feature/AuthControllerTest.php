<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     */
    public function testLoginView()
    {
        $this->get('/')->assertRedirectToRoute('login');
    }

    public function testRegisterView()
    {
        $this->get('register')->assertSeeText('Register');
    }

    public function testStore()
    {
        $this->post('register', [
            'nama' => 'Akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->assertDatabaseHas('user', ['nama' => 'Akbar']);
    }

    public function testFaildStore()
    {
        $this->post('register', [
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->assertDatabaseMissing('user', ['nama' => 'Akbar']);
    }

    public function testAuth()
    {
        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $response = $this->post('login', [
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
        ]);

        $this->assertAuthenticatedAs($user);
    }

    public function testLogout()
    {
        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->actingAs($user);

        // Coba logout
        $response = $this->post('/logout');

        // Periksa respon sukses dan pengguna tidak terotentikasi
        $response->assertStatus(302); // Redirect ke halaman home atau login
        $response->assertRedirect('/');
        $this->assertGuest();
    }
}
