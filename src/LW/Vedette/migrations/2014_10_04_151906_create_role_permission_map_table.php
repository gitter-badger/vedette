<?php

use Illuminate\Database\Schema\Blueprint;
use Illuminate\Database\Migrations\Migration;

class CreateRolePermissionMapTable extends Migration {

	/**
	 * Run the migrations.
	 *
	 * @return void
	 */
	public function up()
	{
		Schema::create('role_permission', function(Blueprint $table)
		{
			$table->increments('id');

			$table->unsignedInteger('role_id');
			$table->string('permission_id');

			$table->timestamps();

			$table->foreign('role_id')->references('id')->on('roles');
			$table->foreign('permission_id')->references('id')->on('permissions');
		});
	}

	/**
	 * Reverse the migrations.
	 *
	 * @return void
	 */
	public function down()
	{
		Schema::drop('role_permission');
	}

}
