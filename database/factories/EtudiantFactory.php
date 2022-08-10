<?php

namespace Database\Factories;

use App\Models\Ville;
use Illuminate\Database\Eloquent\Factories\Factory;

class EtudiantFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array
     */
    public function definition()
    {
        return [
            'nom' => $this->faker->name(),
            'adresse' => $this->faker->streetAddress(),
            'phone' => $this->faker->numerify('###-###-####'),
            'email' => $this->faker->unique()->safeEmail(),
            'date_naissance' => $this->faker->dateTimeBetween('1922-01-01', '2006-12-31')->format('Y-m-d'),
            'ville_id' => Ville::all(['id'])->random()
        ];
    }
}
