<?php namespace LW\Vedette\Repositories\Criteria;

use LW\Vedette\Models\UserModelInterface;

class UserRoleCriteria extends AbstractJoinCriteria {

	/**
	 * @var \LW\Vedette\Models\UserModelInterface
	 */
	protected $user;

	/**
	 * @param LW\Vedette\Models\UserModelInterface $user
	 */
	public function __construct(UserModelInterface $user)
	{
		$this->user = $user;
	}

	/**
	 * Apply query conditions.
	 * 
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 * @return void
	 */
	public function apply($query)
	{
		$this->join($query, 'user_role', ['user_role.role_id', '=', 'roles.id']);
		$query->where('user_role.user_id', '=', $this->user->getKey());
	}

}