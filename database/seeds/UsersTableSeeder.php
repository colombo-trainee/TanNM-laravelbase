<?php

use Illuminate\Database\Seeder;

class UsersTableSeeder extends Seeder
{
    /**
     * Run the database seeds.
     *
     * @return void
     */
    public function run()
    {
         $faker = Faker\Factory::create();

        $limit = 100;

        for ($i = 0; $i < $limit; $i++) {
            DB::table('users')->insert([ //,
                'name' => $faker->name,
                'username'=>$faker->name,
                'email' => $faker->unique()->email,
                'password'=>bcrypt('123456'),
                'address' => $faker->address,
                'sex'=>'Girl',
                'birthday'=>$faker->date($format = 'Y-m-d', $max = 'now'),
                'slogan'=>$faker->text($maxNbChars = 200) 
            ]);
        }
    }
}
