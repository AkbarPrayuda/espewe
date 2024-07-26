<?php

namespace Tests\Feature;

use App\Models\Jurusan;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class JurusanControllerTest extends TestCase
{
    use RefreshDatabase;

    public function testIndexView()
    {
        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);
        $this->get('jurusan')->assertSeeText('jurusan');
    }

    public function testCreateView()
    {
        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);
        $this->get('jurusan/create')->assertSeeText('jurusan');
    }

    public function testStore()
    {

        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $this->post('jurusan', [
            'jurusan' => 'RPL'
        ]);

        $this->assertDatabaseHas('jurusan', ['jurusan' => 'RPL']);
    }

    public function testJurusanDelete()
    {
        $user = User::create([
            'nama' => 'Akbar',
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);
        $this->actingAs($user);

        $jurusan = Jurusan::create([
            'jurusan' => 'RPL'
        ]);

        $this->delete('jurusan/' . $jurusan['id']);

        $this->assertDatabaseMissing('jurusan', ['jurusan' => 'RPL']);
    }
}
