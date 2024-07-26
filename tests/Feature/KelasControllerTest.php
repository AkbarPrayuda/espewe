<?php

namespace Tests\Feature;

use App\Models\Kelas;
use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class KelasControllerTest extends TestCase
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

        $this->get('kelas')->assertSeeText('kelas');
    }

    public function testCreate()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar2@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->actingAs($user);

        $this->get('kelas/create')->assertSeeText('kelas create');
    }

    public function testStore()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar3@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->actingAs($user);

        $this->post('kelas', [
            'kelas' => 'x',
            'jurusan_id' => '1'
        ]);

        $this->assertDatabaseHas('kelas', ['kelas' => 'x']);
    }

    public function testDelete()
    {
        $user = User::create([
            'nama' => 'akbar',
            'email' => 'akbar4@gmail.com',
            'password' => 'password',
            'kelas_id' => '1',
        ]);

        $this->actingAs($user);

        $kelas = Kelas::create([
            'kelas' => 'x',
            'jurusan_id' => '1'
        ]);

        $this->delete('kelas/' . $kelas['id']);

        $this->assertDatabaseMissing('kelas', ['kelas' => 'x']);
    }
}
