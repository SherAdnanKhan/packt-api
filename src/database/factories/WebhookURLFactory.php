<?php

namespace Database\Factories;

use App\Models\User;
use App\Models\WebhookURL;
use Illuminate\Database\Eloquent\Factories\Factory;

class WebhookURLFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = WebhookURL::class;

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
            'url' => $this->faker->url,
            'canary' => $this->faker->randomElement([true, false]),
            'status' => $this->faker->randomElement([true, false])
        ];
    }
}
