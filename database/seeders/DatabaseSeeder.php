<?php

namespace Database\Seeders;

use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Hash;

class DatabaseSeeder extends Seeder
{
    /**
     * Seed the application's database.
     *
     * @return void
     */
    public function run()
    {
        DB::table('users')->insert([
            [ 
                "username" => "test",
                "email" => "test@gmail.com",
                "password" => Hash::make('test')
            ]
        ]);

        DB::table('dormitories')->insert([
            [ 
                "name" => "Asep",
                "address" => "Malang",
                "phone_number" => "081234567890"
            ],
            [ 
                "name" => "Budi",
                "address" => "Surabaya",
                "phone_number" => "0812345678901"
            ],
            [ 
                "name" => "Ceco",
                "address" => "Madura",
                "phone_number" => "0812345678902"
            ],
        ]);

        DB::table('rooms')->insert([
            [ 
                "room_number" => "1",
                "fk_id_dormitory" => 1
            ],
            [ 
                "room_number" => "2",
                "fk_id_dormitory" => 2
            ],
            [ 
                "room_number" => "3",
                "fk_id_dormitory" => NULL,
            ],
        ]);

        DB::table('room_images')->insert([
            [ 
                "image" => "1.jpg",
                "fk_id_room" => 1
            ],
            [ 
                "image" => "2.jpg",
                "fk_id_room" => 1
            ],
            [ 
                "image" => "3.jpg",
                "fk_id_room" => 1,
            ],
        ]);
    }
}
