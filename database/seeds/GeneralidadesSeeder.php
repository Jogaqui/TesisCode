<?php

use Illuminate\Database\Seeder;
use App\TipoConoce;
use App\Conocenos;

class GeneralidadesSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
      TipoConoce::create([
          'nombre' => 'Misión',
          'estado' => 1,
          'created_at' => now(),
          'updated_at' => now(),
      ]);
      Conocenos::create([
        'tipo' => 1,
        'descripcion' => "Somos la Oficina Técnica Especializada, en apoyo a los procesos administrativos y académicas al estudiante, ofreciendo servicio de calidad a las diferentes Oficinas Académicas de nuestra Universidad, basada en el cumplimiento a los estándares de calidad y el mejoramiento continuo en sus servicios.",
        'estado' => 1,
      ]);

      TipoConoce::create([
          'nombre' => 'Visión',
          'estado' => 1,
          'created_at' => now(),
          'updated_at' => now(),
      ]);
      Conocenos::create([
        'tipo' => 2,
        'descripcion' => "Al 2024, la Oficina de Registro Técnico, se encuentra ubicada entre las mejores oficinas técnicas de apoyo, reconocida por su calidad, servicio al estudiante, fortaleciendo la gestión académica y desarrollo curricular, en cumplimiento a los estándares de calidad y pertinencia, que satisface los grupos de interés contribuyendo a mejorar la gestión Institucional.",
        'estado' => 1,
      ]);

      TipoConoce::create([
          'nombre' => 'Funciones',
          'estado' => 1,
          'created_at' => now(),
          'updated_at' => now(),
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Proponer al Rectorado los lineamientos de política para el adecuado funcionamiento de los servicios de Registros Académicos y Técnicos.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Programar, dirigir, ejecutar, evaluar y controlar las acciones del órgano a su cargo.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Proponer los calendarios de matrículas, traslados, reanudación de estudios y segunda profesionalización.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Mantener actualizado los historiales académicos y base de datos de los alumnos.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Organizar y reglamentar los diversos servicios de matrícula, Identificación del estudiante, Estadística, Cómputo, Grados y Títulos.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Confeccionar los padrones para la tramitación de carnets a la Asamblea Nacional de Rectores y su distribución respectiva.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Supervisar la elaboración de padrones de alumnos matriculados, actas de examen y otros.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Supervisar la procedencia de las Resoluciones referentes a matrículas, convalidaciones, exoneraciones, retiros de matrículas y otros.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Supervisar la elaboración de padrones de alumnos matriculados por Escuelas, listados, actas de exámenes y otros.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Atender las diversas solicitudes requeridas por los recurrentes.",
        'estado' => 1,
      ]);
      Conocenos::create([
        'tipo' => 3,
        'descripcion' => "Las demás que le asigne la Alta Dirección y las que le corresponda por disposiciones Legales Vigentes.",
        'estado' => 1,
      ]);

    }
}
