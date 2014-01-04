<?php

class DatabaseSeeder extends Seeder {

	/**
	 * Run the database seeds.
	 *
	 * @return void
	 */
	public function run()
	{
		Eloquent::unguard();

		// $this->call('UserTableSeeder');
		$this->call('FramesTableSeeder');
		$this->call('CamerasTableSeeder');
		$this->call('ProjectsTableSeeder');
	}

}