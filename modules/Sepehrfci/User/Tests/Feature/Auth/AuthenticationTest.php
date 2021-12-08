<?php

namespace Sepehrfci\User\Tests\Feature\Auth;

use Illuminate\Support\Str;
use Sepehrfci\User\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{
    use RefreshDatabase;

    public function test_login_screen_can_be_rendered()
    {
        $response = $this->get('/login');

        $response->assertStatus(200);
    }

    public function test_users_can_authenticate_using_the_login_screen_by_email()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $response = $this->post(route('login'), [
            'login' => $user->email,
            'password' => '12345678',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password_by_email()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $this->post('/login', [
            'login' => $user->email,
            'password' => '12345678-wrong',
        ]);

        $this->assertGuest();
    }

    public function test_users_can_authenticate_using_the_login_screen_by_phone()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);
        $response = $this->post(route('login'), [
            'login' => $user->phone,
            'password' => '12345678',
        ]);
        $this->assertAuthenticated();
        $response->assertRedirect(RouteServiceProvider::HOME);
    }

    public function test_users_can_not_authenticate_with_invalid_password_by_phone()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => bcrypt('12345678'),
            'remember_token' => Str::random(10),
        ]);

        $this->post('/login', [
            'login' => $user->phone,
            'password' => '12345678-wrong',
        ]);

        $this->assertGuest();
    }
}
