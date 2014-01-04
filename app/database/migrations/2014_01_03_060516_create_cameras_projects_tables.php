<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateCamerasProjectsTables extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('projects', function(Blueprint $table) {
			$table->increments('id');
			$table->string('name');
			$table->string('description');
			$table->timestamps();
		});

		Schema::create('cameras', function(Blueprint $table) {
			$table->increments('id');
			$table->integer('project_id')->unsigned();
			$table->foreign('project_id')->references('id')->on('projects');
			$table->double('lat')->nullable();
			$table->double('lon')->nullable();
			$table->timestamps();
		});

		Schema::table('frames', function(Blueprint $table) {
			$table->integer('camera_id')->unsigned();
			$table->foreign('camera_id')->references('id')->on('cameras');
			$table->dropColumn('frameSourceID');
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('cameras');
		Schema::drop('projects');
		Schema::table('frames', function(Blueprint $table) {
			$table->dropColumn('camera_id');
			$table->integer('frameSourceID');
		});
	}

}
