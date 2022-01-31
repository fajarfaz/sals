<?php

namespace Database\Seeders;
use App\Models;
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

           $user = [
            [
                'username' => 'admin',
                'name'=>'ini akun Admin',
                'email'=>'admin@example.com',
                'level'=>'admin',
                'password'=> bcrypt('123456'),
            ],
            [
                'username' => 'user',
                'name'=>'ini akun User (non admin)',
                'email'=>'user@example.com',
                'level'=>'editor',
                'password'=> bcrypt('123456'),
            ],
        ];
        foreach ($user as $key => $value) {
            User::create($value);
        }
        
        Category::create([
            'name' => 'Clothes',
            'slug' => 'clothes'
        ],
        [
            'name' => 'Packaging',
            'slug' => 'packaging'
        ],
    
            'name' => 'Cup Glass',
            'slug' => 'cup_glass'
        ]);
    }
}
