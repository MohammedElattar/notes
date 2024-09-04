<?php

namespace Modules\Note\Database\Seeders;

use Illuminate\Database\Seeder;
use Modules\Note\Database\Factories\NoteFactory;
use Modules\Note\Models\Note;

class NoteDatabaseSeeder extends Seeder
{
    /**
     * Run the database seeds.
     */
    public function run(): void
    {
        Note::factory(100)->create();
    }
}
