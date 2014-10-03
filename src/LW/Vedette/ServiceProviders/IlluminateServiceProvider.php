<?php namespace LW\Vedette\ServiceProviders;

use Illuminate\Support\ServiceProvider;

class IlluminateServiceProvider extends ServiceProvider {

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