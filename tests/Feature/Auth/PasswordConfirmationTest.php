<?php

namespace Tests\Feature\Auth;

use Sepehrfci\User\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $response = $this->actingAs($user)->get(route('password.confirm'));

        $response->assertStatus(200);
    }

    public function test_password_can_be_confirmed()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'password',
        ]);

        $response->assertRedirect();
        $response->assertSessionHasNoErrors();
    }

    public function test_password_is_not_confirmed_with_invalid_password()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'email_verified_at' => now(),
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
        ]);

        $response = $this->actingAs($user)->post('/confirm-password', [
            'password' => 'wrong-password',
        ]);

        $response->assertSessionHasErrors();
    }
}
