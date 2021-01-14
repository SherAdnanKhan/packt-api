<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\UserProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class UserProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = UserProduct::class;

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
            'product_id' => $this->faker->randomNumber()
        ];
    }
}
