<?php

use App\Channel;
use Illuminate\Database\Seeder;

class ChannelsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Channel::create([
            'name' => 'Consultas',
            'slug' => str_slug('Consultas')
        ]);

        Channel::create([
            'name' => 'Presentación',
            'slug' => str_slug('Presentacion')
        ]);

        Channel::create([
            'name' => 'Proyectos',
            'slug' => str_slug('Proyectos')
        ]);

        Channel::create([
            'name' => 'Tutoriales',
            'slug' => str_slug('Tutoriales')
        ]);

        Channel::create([
            'name' => 'Venta',
            'slug' => str_slug('Venta')
        ]);

        Channel::create([
            'name' => 'Fotos',
            'slug' => str_slug('Fotos')
        ]);
    }
}
