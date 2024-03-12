<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use App\Models\User;

/**
 * @extends \Illuminate\Database\Eloquent\Factories\Factory<\App\Models\Empresa>
 */
class EmpresaFactory extends Factory
{
    /**
     * Define the model's default state.
     *
     * @return array<string, mixed>
     */
    public function definition(): array
    {
        // Get a random user with type 'E'
        $user = User::where('tipo', 'E')->inRandomOrder()->first();
        return [
            'nombre_empresa' => $this->faker->name,
            'cif' => $this->faker->text(10),
            'iban' => $this->faker->text(24),
            'user_id' => $user->id ?? User::factory()->create()->id, // Generate a random user ID if no user with type 'E' is found
        ];
    }
}
