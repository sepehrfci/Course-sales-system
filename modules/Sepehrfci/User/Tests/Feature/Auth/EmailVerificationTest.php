<?php

namespace Sepehrfci\User\Tests\Feature\Auth;

use Sepehrfci\User\Models\User;
use App\Providers\RouteServiceProvider;
use Illuminate\Auth\Events\Verified;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Support\Facades\URL;
use Sepehrfci\User\Services\VerifyCodeService;
use Tests\TestCase;

class EmailVerificationTest extends TestCase
{
    use RefreshDatabase;

    public function test_email_verification_screen_can_be_rendered()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => null,
        ]);

        $response = $this->actingAs($user)->get('/verify-email');

        $response->assertStatus(200);
    }

    public function test_email_can_be_verified()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => null,
        ]);

//        Event::fake();
//
//        $verificationUrl = URL::temporarySignedRoute(
//            'verification.verify',
//            now()->addMinutes(60),
//            ['id' => $user->id, 'hash' => sha1($user->email)]
//        );
//
//        $response = $this->actingAs($user)->get($verificationUrl);
//
//        Event::assertDispatched(Verified::class);
        auth()->loginUsingId($user->id);
        $code = VerifyCodeService::generateCode();
        VerifyCodeService::setCache($user->id,$code);
        $response = $this->post(route('verification.verify'),[
            'verify_code' => $code
        ]);
        $this->assertAuthenticated();
        $this->assertTrue($user->fresh()->hasVerifiedEmail());
        //dd($response);
        //$response->assertRedirect('http://localhost' . RouteServiceProvider::HOME . '?verified=1');
    }

    public function test_email_is_not_verified_with_invalid_hash()
    {
        $user = User::create([
            'name' => 'sepehr',
            'email' => 'sepehr123@gmail.com',
            'phone' => '9123654879',
            'password' => '$2y$10$92IXUNpkjO0rOQ5byMi.Ye4oKoEa3Ro9llC/.og/at2.uheWG/igi',
            'email_verified_at' => null,
        ]);

//        $verificationUrl = URL::temporarySignedRoute(
//            'verification.verify',
//            now()->addMinutes(60),
//            ['id' => $user->id, 'hash' => sha1('wrong-email')]
//        );
//
//        $this->actingAs($user)->get($verificationUrl);
        auth()->loginUsingId($user->id);
        $code = VerifyCodeService::generateCode();
        VerifyCodeService::setCache($user->id,$code);
        $this->assertAuthenticated();
        $this->post(route('verification.verify'),[
            'verify_code' => 100000
        ]);
        $this->assertFalse($user->fresh()->hasVerifiedEmail());
    }
}
