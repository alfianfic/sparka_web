<?php
namespace Database\Seeders;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Str;
use App\Models\User;
use Faker\Factory as Faker;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;

class UserSeeder extends Seeder
{
    public function run()
    {
         $faker = \Faker\Factory::create('id_ID');
        User::create([
                'name' => "defta",
                'email' => "defta123@gmail.com",
                'CO' => $faker->numberBetween(0, 10), // Contoh: Karbon Monoksida
                'FEV1' => $faker->randomFloat(2, 1.0, 4.0),
                'FEV1_max' => $faker->randomFloat(2, 2.0, 5.0),
                'FVC' => $faker->randomFloat(2, 2.0, 6.0),
                'FVC_max' => $faker->randomFloat(2, 3.0, 7.0),
                'age' => $faker->numberBetween(18, 22),
                'gender' => $faker->randomElement(['male', 'female']),
                'height' => $faker->numberBetween(150, 190),
                'weight' => $faker->numberBetween(45, 100),
                'status' => $faker->numberBetween(1, 4),
                'email_verified_at' => now(),
                'password' => Hash::make('1'), // default password
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
        ]);
        User::create([
                'name' => "dipi",
                'email' => "divia123@gmail.com",
                'CO' => $faker->numberBetween(0, 10), // Contoh: Karbon Monoksida
                'FEV1' => $faker->randomFloat(2, 1.0, 4.0),
                'FEV1_max' => $faker->randomFloat(2, 2.0, 5.0),
                'FVC' => $faker->randomFloat(2, 2.0, 6.0),
                'FVC_max' => $faker->randomFloat(2, 3.0, 7.0),
                'age' => $faker->numberBetween(18, 23),
                'gender' => $faker->randomElement(['male', 'female']),
                'height' => $faker->numberBetween(150, 190),
                'weight' => $faker->numberBetween(45, 100),
                'status' => $faker->numberBetween(1, 4),
                'email_verified_at' => now(),
                'password' => Hash::make('2'), // default password
                'role' => 'admin',
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
        ]);

       

        foreach (range(1, 3) as $index) {
            User::create([
                'name' => $faker->name,
                'email' => $faker->unique()->safeEmail,
                'CO' => $faker->numberBetween(0, 10), // Contoh: Karbon Monoksida
                'FEV1' => $faker->randomFloat(2, 1.0, 4.0),
                'FEV1_max' => $faker->randomFloat(2, 2.0, 5.0),
                'FVC' => $faker->randomFloat(2, 2.0, 6.0),
                'FVC_max' => $faker->randomFloat(2, 3.0, 7.0),
                'age' => $faker->numberBetween(30, 70),
                'gender' => $faker->randomElement(['male', 'female']),
                'height' => $faker->numberBetween(150, 190),
                'weight' => $faker->numberBetween(45, 100),
                'status' => $faker->numberBetween(1, 4),
                'email_verified_at' => now(),
                'password' => Hash::make('password'), // default password
                'role' => 'user',
                // 'role' => $faker->randomElement(['user', 'admin']),
                'remember_token' => Str::random(10),
                'created_at' => now(),
                'updated_at' => now(),
            ]);
        }

    }
}
