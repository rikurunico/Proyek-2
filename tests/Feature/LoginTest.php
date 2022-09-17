<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;

class LoginTest extends TestCase
{
    /**
     * A basic feature test example.
     *
     * @return void
     */
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
            "username" => "test",
            "password" => "test"
        ]);

        $response->assertSessionHas("loginError", "Login Failed!");
    }

    public function test_login_account_found()
    {
        $response = $this->post('/login', [
            "username" => "admin",
            "password" => "admin"
        ]);

        $response->assertRedirect("/dashboard");
    }

}
