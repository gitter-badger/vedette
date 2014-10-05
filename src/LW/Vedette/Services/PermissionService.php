<?php namespace LW\Vedette\Services;

use LW\Vedette\Models\UserModelInterface;
use LW\Vedette\Repositories\RoleRepositoryInterface;
use LW\Vedette\Repositories\PermissionRepositoryInterface;

class PermissionService {

	/**
	 * @var \LW\Vedette\Repositories\RoleRepositoryInterface
	 */
	protected $roles;

	/**
	 * @var \LW\Vedette\Repositories\PermissionRepositoryInterface
	 */
	protected $permissions;

	/**
	 * @var \LW\Vedette\Models\RoleModelInterface[]|null
	 */
	protected $roleCache = null;

	/**
	 * @var \LW\Vedette\Models\PermissionModelInterface[]|null
	 */
	protected $permissionCache = null;

	/**
	 * @param LW\Vedette\Repositories\RoleRepositoryInterface $roles
	 * @param LW\Vedette\Repositories\PermissionRepositoryInterface $permissions
	 */
	protected function __construct(RoleRepositoryInterface $roles,
	                               PermissionRepositoryInterface $permissions)
	{
		$this->users = $users;
		$this->roles = $roles;
		$this->permissions = $permissions;
	}

	/**
	 * @param \LW\Vedette\Models\UserModelInterface $user
	 * @return static
	 */
	public function setUser(UserModelInterface $user)
	{
		$this->user = $user;
		$this->roleCache = null;
		$this->permissionCache = null;

		return $this;
	}

	/**
	 * @return \LW\Vedette\Models\RoleModelInterface[]
	 */
	public function roles()
	{
		$this->checkUserOrFail();

		if (is_null($this->roleCache))
		{
			$this->roleCache = $this->roles->getByUser($this->user);
		}

		return $this->roleCache;
	}

	/**
	 * @return \LW\Vedette\Models\PermissionModelInterface[]
	 */
	public function permissions()
	{
		$this->checkUserOrFail();

		if (is_null($this->permissionCache))
		{
			$this->permissionCache = $roles = $this->roles();
		}

		return $this->permissionCache;
	}

	/**
	 * @param string $permission
	 * @return bool
	 */
	public function has($permission)
	{
		if (! $this->user)
		{
			return false;
		}

		return in_array($permission, $this->permissions->lists('id'));
	}

	/**
	 * @return void
	 * @throws \BadMethodCallException
	 */
	protected function checkUserOrFail()
	{
		if (! $this->user)
		{
			throw new \BadMethodCallException('No user object set on permission service.');
		}
	}

}