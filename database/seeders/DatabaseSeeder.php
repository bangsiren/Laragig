<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\Listing;
use Illuminate\Database\Seeder;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        \App\Models\User::factory(10)->create();

        Listing::create([
          'title' => 'Laravel Senior Developer',
          'tags' => 'Laravel Javascript',
          'company' => 'SAM GG',
          'location' => 'Boston, AM',
          'email' => 'email1@email.com',
          'website' => 'https://www.acme.com',
          'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
                            Quidem, dolore quia nulla placeat similique odit odio quis? Dolor facilis sed maxime, 
                            assumenda est qui sint enim adipisci, excepturi iste consectetur.'
        ]);

    }
}
