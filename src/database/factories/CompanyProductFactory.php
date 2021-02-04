<?php

namespace Database\Factories;

use App\Models\Company;
use App\Models\CompanyProduct;
use Illuminate\Database\Eloquent\Factories\Factory;

class CompanyProductFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = CompanyProduct::class;

    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        $company= Company::factory()->create();

        return [
            'company_id'=> $company->id,
            'product_id' => $this->faker->randomNumber()
        ];
    }
}
