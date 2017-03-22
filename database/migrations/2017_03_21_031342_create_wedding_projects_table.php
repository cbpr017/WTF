<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;

class CreateWeddingProjectsTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('wedding_projects', function(Blueprint $table)
		{
			$table->integer('id', true);
			$table->text('project_name', 65535)->nullable();
			$table->text('task_name', 65535)->nullable();
			$table->text('task_description', 16777215)->nullable();
			$table->timestamps();
			$table->dateTime('completed')->nullable();
			$table->text('status', 65535)->nullable();
		});
	}


	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('wedding_projects');
	}

}
