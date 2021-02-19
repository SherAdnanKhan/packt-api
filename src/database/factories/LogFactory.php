<?php

namespace Database\Factories;

use App\Models\Log;
use App\Models\User;
use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Carbon;

class LogFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Log::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $httpStatus = config('endpoints.httpStatusText');

        $user = User::factory()->create();
        return [
            'message' => $user->id,
            'channel' => 'APILog',
            'level' => 200,
            'level_name' => 'INFO',
            'unix_time' => time(),
            'datetime' => Carbon::now()->format(config('logtodb.datetime_format')),
            'context' => [
                'endpoint' => $this->faker->randomElement([
                    '/api/v1/test',
                    '/api/v1/products',
                    '/api/v1/products/9780470185483',
                    '/api/v1/products/9780470185483/cover/small',
                    '/api/v1/products/9780470185483/authors',
                    '/api/v1/products/9780470185483/files/pdf',
                    '/api/v1/products/9780470185483/price/GB'
                ]),
                'method' => $this->faker->randomElement([
                    'GET',
                    'POST'
                ]),
                'endpointName' => $this->faker->randomElement([
                    'Test',
                    'Product',
                    'Content',
                    'Author'
                ]),
                'description' => $this->faker->sentence(5),
                'status' => $this->faker->randomElement(
                    $httpStatus
                )
            ]
        ];
    }


    /**
     * Indicate that the user is suspended.
     *
     * @return Factory
     */
    public function yesterday(): Factory
    {
        return $this->state(function (array $attributes) {
            return [
                'datetime' => Carbon::now()->subDays(1)->format('Y-m-d H:i:s:ms')
            ];
        });
    }
}
