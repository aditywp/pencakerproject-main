<?php

namespace Tests\Feature\Auth;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Support\Facades\Hash;
use Tests\TestCase;

class PasswordConfirmationTest extends TestCase
{
    use RefreshDatabase;

    public function test_confirm_password_screen_can_be_rendered(): void
    {
        $user = User::factory()->create();

        $response = $this->actingAs($user)->get('/confirm-password');

        $response->assertStatus(200);
    }

    public function test_password_is_not_confirmed_with_invalid_password(): void
    {
        $user = User::factory()->create([
            'password' => Hash::make('password'),
        ]);

        $response = $this->actingAs($user)
                         ->from('/confirm-password')
                         ->withoutMiddleware()
                         ->post('/confirm-password', [
                             'password' => 'wrong-password',
                         ]);

        $response->assertRedirect('/confirm-password');
        $response->assertSessionHasErrors('password');
    }
}
