<?php

namespace Database\Seeders;

// use Illuminate\Database\Console\Seeds\WithoutModelEvents;

use App\Models\User;
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
        // \App\Models\User::factory(5)->create();
        $user = User::factory()->create([
            'name'=> 'John Doe',
            'email'=> 'john@gmail.com'
        ]);
        Listing::factory(6)->create([
            'user_id'=> $user->id
        ]);
        
        // Listing::create([
        //   'title' => 'Laravel Senior Developer',
        //   'tags' => 'Laravel Javascript',
        //   'company' => 'SAM GG',
        //   'location' => 'Boston, AM',
        //   'email' => 'email1@email.com',
        //   'website' => 'https://www.acme.com',
        //   'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        //                     Quidem, dolore quia nulla placeat similique odit odio quis? Dolor facilis sed maxime, 
        //                     assumenda est qui sint enim adipisci, excepturi iste consectetur.'
        // ]);
        
        // Listing::create([
        //     'title' => 'Laravel Jenior Developer',
        //     'tags' => 'Note',
        //     'company' => 'ACME PP',
        //     'location' => 'Tonson, SEF',
        //     'email' => 'email2@email.com',
        //     'website' => 'https://www.acme.com/',
        //     'description' => 'Lorem ipsum dolor sit amet consectetur adipisicing elit. 
        //                       Quidem, dolore quia nulla placeat similique odit odio quis? Dolor facilis sed maxime, 
        //                       assumenda est qui sint enim adipisci, excepturi iste consectetur.'
        //   ]);

    }
}
