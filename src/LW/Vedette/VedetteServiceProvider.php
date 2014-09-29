<?php namespace LW\Vedette\VedetteServiceProvider;

use Illuminate\Support\ServiceProvider;

class VedetteServiceProvider extends ServiceProvider {

	/**
	 * Register the service provider.
	 *
	 * @return void
	 */
	public function register()
	{
		$this->package('legalweb/vedette', 'vedette', __DIR__);

		$this->registerRepositories();
		$this->registerServices();
	}

	/**
	 * @return void
	 */
	public function registerRepositories()
	{
		//
	}

	/**
	 * @return void
	 */
	public function registerServices()
	{
		//
	}

}