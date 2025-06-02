<?php

namespace Database\Factories;

use Illuminate\Database\Eloquent\Factories\Factory;
use Illuminate\Support\Str;
use App\Models\Certificado;

class CertificadoFactory extends Factory
{
    /**
     * The name of the factory's corresponding model.
     *
     * @var string
     */
    protected $model = Certificado::class;

    /**
     * Define the model's default state.
     */
    public function definition(): array
    {
        return [
            'nombre_completo' => fake()->word(),
            'tipo_doc' => fake()->word(),
            'documento' => fake()->word(),
            'fecha_creacion' => fake()->dateTime(),
            'departamento' => fake()->word(),
            'ciudad' => fake()->word(),
            'empresa' => fake()->word(),
            'curso' => fake()->word(),
            'codigo_certificado' => fake()->word(),
        ];
    }
}
