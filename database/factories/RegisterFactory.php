<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Register>
 */
class RegisterFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        return [
            'name'=>$this->faker->randomElement([
                'tay zar','kyaw gyi','paing gyi','nyi nyi',
                'aung ko','khine khine','wai wai','phyu phyu',
                'wahr wahr','wine wine'
            ]),
            'age'=>$this->faker->numberBetween(17,32),
            'email'=>$this->faker->freeEmail(),
            'address'=>$this->faker->randomElement([
                'yangon','bago','mandalay','magway','sagaing'
            ])
        ];
    }
}
