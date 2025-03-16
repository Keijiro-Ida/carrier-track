<?php

namespace Tests\Feature;

use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Tests\TestCase;
use App\Models\User;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Log;
use Illuminate\Support\Facades\DB;

class AuthControllerTest extends TestCase
{
    use RefreshDatabase;

     /** @test */
    public function user_can_register_successfully(): void
    {
        Log::info('Current Environment', ['env' => app()->environment()]);
        Log::info('DB Connection', ['db' => DB::connection()->getDatabaseName()]);

        $response = $this->postJson('/api/register', [
            'name' => 'Test User',
            'email' => 'test@gmail.com',
            'password' => 'password',
            'password_confirmation' => 'password',
        ]);
        $response->assertStatus(200)
            ->assertJson([
                'message' => 'User created successfully',
            ]);

        $this->assertDatabaseHas('users', [
            'email' => 'test@gmail.com',
        ]);
    }
    /** @test */
    public function user_cannot_register_with_invalid_data(): void
    {
        $response = $this->postJson('/api/register', [
            'name' => '',
            'email' => 'invalid_email',
            'password' => '123',
            'password_confirmation' => '456',
        ]);
        $response->assertStatus(422)
            ->assertJsonStructure([
                'errors' => [
                    'name',
                    'email',
                    'password',
                ],
            ]);
    }

    /** @test */
    public function user_can_login_successfully(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'password',
        ]);

        $response->assertStatus(200)
            ->assertJsonStructure(['token']);
    }

    /** @test */
    public function user_cannot_login_with_invalid_data(): void
    {
        $user = User::factory()->create([
            'email' => 'test@example.com',
            'password' => Hash::make('password'),
        ]);

        $response = $this->postJson('/api/login', [
            'email' => 'test@example.com',
            'password' => 'wrong-password',
        ]);

        $response->assertStatus(401)
            ->assertJson(['message' => 'Unauthorized']);
    }
}
