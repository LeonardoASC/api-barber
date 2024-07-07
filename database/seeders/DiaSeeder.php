<?php

namespace Database\Seeders;

use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use App\Models\Dia;

class DiaSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        $dias = [
            ['id_dia' => '1', 'dia' => 'Domingo', 'status' => 'inativo'],
            ['id_dia' => '2', 'dia' => 'Segunda-feira', 'status' => 'inativo'],
            ['id_dia' => '3', 'dia' => 'Terça-feira', 'status' => 'ativo'],
            ['id_dia' => '4', 'dia' => 'Quarta-feira', 'status' => 'ativo'],
            ['id_dia' => '5', 'dia' => 'Quinta-feira', 'status' => 'ativo'],
            ['id_dia' => '6', 'dia' => 'Sexta-feira', 'status' => 'ativo'],
            ['id_dia' => '7', 'dia' => 'Sábado', 'status' => 'ativo'],
        ];

        foreach ($dias as $dia) {
            Dia::create($dia);
        }
    }
}
                     