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
            'nombre_completo' => fake()->name(),
            'tipo_doc' => "CC",
            'documento' => fake()->numberBetween(00000000, 99999999),
            'fecha_creacion' => fake()->dateTime(),
            'departamento' => "VAC",
            'ciudad' => "Cali",
            'empresa' => fake()->userName(),
            // Generate a code for the course based on the first letter, next 3 letters, and a random number
            'curso' => (function () {
                $cursoNombre = fake()->randomElement(['Curso de Capacitación', 'Curso de Actualización', 'Curso de Especialización']);
                $words = explode(' ', $cursoNombre);
                $firstWord = $words[0] ?? '';
                $secondWord = $words[1] ?? '';
                $code = strtoupper(substr($firstWord, 0, 1) . substr($secondWord, 0, 3));
                $number = str_pad(fake()->numberBetween(0, 999), 3, '0', STR_PAD_LEFT);
                return $code . $number;
            })(),
            'codigo_certificado' => fake()->word(),
        ];
    }
}
