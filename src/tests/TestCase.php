<?php

namespace Tests;

use App\Models\User;
use Illuminate\Foundation\Testing\TestCase as BaseTestCase;
use Laravel\Jetstream\Jetstream;

abstract class TestCase extends BaseTestCase
{
    use CreatesApplication;

    /**
     * @var $headers array headers for API requests
     */
    protected array $headers;

    /**
     * Create a User and API Access Token with given permissions
     * @param array $accessPermissions
     * @return mixed
     */
    public function createUserAndToken(array $accessPermissions)
    {
        $user = User::factory()->create();

        $token = $user->createToken(
            'test',
            Jetstream::validPermissions($accessPermissions),
            false
        )->plainTextToken;

        $this->headers = [
            'Authorization' => 'Bearer ' . $token
        ];

        return $user;
    }

}
