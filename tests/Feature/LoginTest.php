<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    use RefreshDatabase;
    /**
     * A basic feature test example.
     *
     * @return void
     */

    public function setUp(): void
    {
        parent::setUp();
        $this->user = User::factory()->create();
    }

    public function test_login_page_loads()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_login_page_contains_login_form()
    {
        $response = $this->get('/login');

        $response->assertSee('form');
    }

    public function test_login_page_contains_correct_fields()
    {
        $response = $this->get('/login');

        $response->assertSee('username');
        $response->assertSee('password');
    }

    public function test_login_account_not_found()
    {
        $response = $this->post('/login', [
            'username' => 'notfound',
            'password' => 'notfound',
        ]);
        $response->assertSessionHas("loginError", "Login Failed!");
    }

    public function test_login_account_found()
    {
        //CREATE ACCOUNT FOR TESTING
        $user = User::factory()->create([
            'username' => 'test',
            'password' => bcrypt('test'),
        ]);
        $response = $this->post('/login', [
            "username" => "test",
            "password" => "test"
        ]);

        $response->assertRedirect("/dashboard");
    }

    public function test_with_factory()
    {
        $this->assertDatabaseHas('users', [
            'username' => $this->user->username,
            'password' => $this->user->password,
        ]);
    }
}
