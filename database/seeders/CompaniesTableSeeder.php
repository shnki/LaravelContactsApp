<?php

namespace Database\Seeders;

use App\Models\User;
use Illuminate\Database\Console\Seeds\WithoutModelEvents;
use Illuminate\Database\Seeder;
use Illuminate\Support\Facades\DB;

class CompaniesTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {

        $companies = [];
        foreach (range(1, 10) as $index) {
            $companies[] = [
                'name' => fake()->company(),
                'address' => fake()->address(),
                'website' => fake()->domainName(),
                'email' => fake()->email(),
                'created_at' => now(),
                'updated_at' => now(),
                'user_id' =>  User::factory()->create()->id


            ];
        }
        DB::table('companies')->insert($companies);
    }
}
