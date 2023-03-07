<?php

namespace Database\Seeders;

use App\Models\Contact;
use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class ContactsTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {




        $companies = [];
        foreach (range(1, 30) as $index) {
            $contacts[] = [
                'first_name' => fake()->firstName(),
                'last_name' => fake()->lastName(),
                'phone' => fake()->phoneNumber(),
                'email' => fake()->email(),
                'address' => fake()->address(),
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' =>  User::factory(),
                'company_id' => rand(1, 9)
            ];
        }
        DB::table('contacts')->insert($contacts);
    }
}
