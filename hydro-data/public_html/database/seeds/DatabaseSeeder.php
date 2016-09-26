<?php

use Illuminate\Database\Seeder;
use Illuminate\Database\Eloquent\Model;
use \App\Models\Pigment;

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
    public function run()
    {
        Model::unguard();
        $this->call('PigmentSeeder');
    }
}


class PigmentSeeder extends Seeder {

    public function run()
    {
        Pigment::create([
            'name' => str_random(10),
            'email' => str_random(10).'@gmail.com',
            'password' => bcrypt('secret'),
        ]);
    }

}