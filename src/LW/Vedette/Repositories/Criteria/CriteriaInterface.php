<?php namespace LW\Vedette\Repositories\Criteria;

interface CriteriaInterface {

	/**
	 * Apply query conditions.
	 * 
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder
	 * @return void
	 */
	public function apply($query);

}