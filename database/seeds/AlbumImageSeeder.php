<?php

use App\models\Album_image;
use Illuminate\Database\Seeder;

class AlbumImageSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album_image::flushEventListeners();
        factory(Album_image::class, 180)->create();
    }
}
