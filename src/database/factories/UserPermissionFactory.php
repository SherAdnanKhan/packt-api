<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserPermission;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserPermissionFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserPermission::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $user = User::factory()->create();
        return [
            'user_id' => $user->id,
            'abilities' => ['ALLCONTENT']
        ];
    }
}
