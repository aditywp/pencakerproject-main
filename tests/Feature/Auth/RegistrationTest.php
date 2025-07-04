<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Event;
use Illuminate\Auth\Events\Registered;
use Tests\TestCase;

class RegistrationTest extends TestCase
{
    use RefreshDatabase;

    public function test_register_screen_can_be_rendered(): void
    {
        $response = $this->get('/register');

        $response->assertStatus(200);
    }

    public function test_users_can_register_with_valid_data(): void
    {
        Event::fake();

        $response = $this->withoutMiddleware()->post('/register', [
            'name' => 'Example User',
            'email' => 'user@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect(route('pencaker.dashboard', absolute: false));
        $this->assertAuthenticated();
        $this->assertDatabaseHas('users', [
            'email' => 'user@example.com',
        ]);

        Event::assertDispatched(Registered::class);
    }

    public function test_registration_fails_with_existing_email(): void
    {
        User::factory()->create([
            'email' => 'user@example.com',
        ]);

        $response = $this->from('/register')->withoutMiddleware()->post('/register', [
            'name' => 'Another User',
            'email' => 'user@example.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('email');
        $this->assertGuest();
    }

    public function test_registration_fails_when_passwords_do_not_match(): void
    {
        $response = $this->from('/register')->withoutMiddleware()->post('/register', [
            'name' => 'Mismatch Password',
            'email' => 'mismatch@example.com',
            'password' => 'password',
            'password_confirmation' => 'different-password',
        ]);

        $response->assertRedirect('/register');
        $response->assertSessionHasErrors('password');
        $this->assertGuest();
    }
}
