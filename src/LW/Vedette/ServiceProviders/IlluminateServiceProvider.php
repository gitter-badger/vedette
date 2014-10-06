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
	protected function registerRepositories()
	{
		$this->app->bind('LW\Vedette\Repositories\UserRepositoryInterface', 'LW\Vedette\Repositories\IlluminateUserRepository');
		$this->app->bind('LW\Vedette\Repositories\RoleRepositoryInterface', 'LW\Vedette\Repositories\IlluminateRoleRepository');
		$this->app->bind('LW\Vedette\Repositories\PermissionRepositoryInterface', 'LW\Vedette\Repositories\IlluminatePermissionRepository');
	}

	/**
	 * @return void
	 */
	protected function registerServices()
	{
		$this->app->bindShared('LW\Vedette\Services\PermissionService', function()
		{
			$roles       = $this->app->make('LW\Vedette\Repositories\RoleRepositoryInterface');
			$permissions = $this->app->make('LW\Vedette\Repositories\PermissionRepositoryInterface');
			$instance    = new Services\PermissionService($roles, $permissions);

			if ($user = $this->app['auth']->user())
			{
				$instance->setUser($user);
			}

			return $instance;
		});
	}

}