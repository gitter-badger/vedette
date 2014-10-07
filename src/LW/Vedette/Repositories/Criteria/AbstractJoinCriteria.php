<?php namespace LW\Vedette\Repositories\Criteria;

abstract class AbstractJoinCriteria implements CriteriaInterface {

	/**
	 * Apply a join to a query.
	 *
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
	 * @param string $table
	 * @param \Callable|array $conditions
	 * @return void
	 * @throws \InvalidArgumentException
	 */
	protected function join($query, $table, $conditions)
	{
		if ($this->hasJoin($query, $table))
		{
			return;
		}

		if (is_callable($conditions))
		{
			$query->join($table, $conditions);
		}
		elseif (is_array($conditions))
		{
			$one = $operator = $two = null;
			$type = 'inner';
			$where = false;

			@list($one, $operator, $two, $type, $where) = $conditions;
			$query->join($table, $one, $operator, $two, $type, $where);
		}
		else
		{
			throw new \InvalidArgumentException('Unknown join conditions.');
		}
	}

	/**
	 * @param \Illuminate\Database\Query\Builder|\Illuminate\Database\Eloquent\Builder $query
	 * @param string $table
	 * @return bool
	 */
	protected function hasJoin($query, $table)
	{
		foreach ($query->joins as $joinClause)
		{
			if ($table === $joinClause->table)
			{
				return true;
			}
		}

		return false;
	}
	

}