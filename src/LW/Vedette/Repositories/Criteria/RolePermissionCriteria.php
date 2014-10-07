<?php namespace LW\Vedette\Repositories\Criteria;

use LW\Vedette\Models\RoleModelInterface;

class RolePermissionCriteria extends AbstractJoinCriteria {

	/**
	 * @var \LW\Vedette\Models\RoleModelInterface
	 */
	protected $role;

	/**
	 * @param LW\Vedette\Models\RoleModelInterface $role
	 */
	public function __construct(RoleModelInterface $role)
	{
		$this->role = $role;
	}

	/**
	 * Apply query conditions.
	 * 
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 * @return void
	 */
	public function apply($query)
	{
		$this->join($query, 'role_permission', ['role_permission.permission_id', '=', 'permissions.id']);
		$query->where('role_permission.role_id', '=', $this->role->getKey());
	}

}