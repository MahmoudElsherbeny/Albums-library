<?php

use App\models\Album;
use Illuminate\Database\Seeder;

class AlbumSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
        Album::flushEventListeners();
        factory(Album::class, 20)->create();
    }
}
