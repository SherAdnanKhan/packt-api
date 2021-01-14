<?php

namespace Tests\Feature;

use App\Models\User;
use Illuminate\Foundation\Testing\RefreshDatabase;
use Illuminate\Foundation\Testing\WithFaker;
use Lunaweb\RecaptchaV3\Facades\RecaptchaV3;
use Tests\TestCase;

class AuthenticationTest extends TestCase
{

    use RefreshDatabase, WithFaker;

    /**
     * @test
     */
    public function login_displays_the_login_form()
    {
        $response = $this->get(route('login'));
        $response->assertStatus(200);
        $response->assertViewIs('auth.login');
    }

    /**
     * @test
     */
    public function login_displays_validation_errors()
    {
        $response = $this->post('login', []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function register_displays_validation_errors()
    {
        $response = $this->post('register', []);
        $response->assertStatus(302);
        $response->assertSessionHasErrors('email');
    }

    /**
     * @test
     */
    public function register_creates_and_auths_user()
    {
        $name = $this->faker->name;
        $email = $this->faker->email;
        $password = $this->faker->password(8);


        RecaptchaV3::shouldReceive('verify')
            ->once()
            ->andReturn(1.0);

        $response = $this->post('register', [
            'name' => $name,
            'email' => $email,
            'password' => $password,
            'password_confirmation' => $password,
            'g-recaptcha-response' => '1'
        ]);

        $user = User::where('email', $email)->where('name', $name)->first();
        $this->assertNotNull($user);
        $this->assertAuthenticatedAs($user);

    }

    /**
     * @test
     */
    public function clicking_logout_redirects_to_home()
    {
        $user = User::factory()->create();
        $response = $this->actingAs($user)->post(route('logout'));
        $response->assertStatus(302);
        $response->assertRedirect('/');
    }

}
