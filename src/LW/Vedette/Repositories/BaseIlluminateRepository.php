<?php namespace LW\Vedette\Repositories;

use Illuminate\Database\Eloquent\Model;
use LW\Vedette\Repositories\Criteria\CriteriaInterface;

abstract class BaseIlluminateRepository extends ElloquentRepository {

	/**
	 * @var \Illuminate\Database\Eloquent\Model
	 */
	protected $model;

	/**
	 * @param \Illuminate\Database\Eloquent\Model $model
	 */
	public function __construct(Model $model)
	{
		$this->model = $model;
	}

	/**
	 * @param \LW\Vedette\Repositories\Criteria\CriteriaInterface $criteria
	 * @return \LW\Vedette\Models\BaseModelInterface[]
	 */
	public function getByCrtieria(CrtieriaInterface $criteria)
	{
		$query = $this->newQuery();
		$this->applyCrtieria($query, $criteria);

		return $query->all();
	}

	/**
	 * @param \LW\Vedette\Repositories\Criteria\CriteriaInterface $criteria
	 * @return \LW\Vedette\Models\BaseModelInterface|null
	 */
	public function findByCrtieria(CrtieriaInterface $criteria)
	{
		$query = $this->newQuery();
		$this->applyCrtieria($query, $criteria);

		return $query->first();
	}

	/**
	 * @param \Illuminate\Database\Eloquent\Builder $query
	 * @param \LW\Vedette\Repositories\Criteria\CriteriaInterface $criteria
	 */
	protected function applyCrtieria($query, CriteriaInterface $criteria)
	{
		$criteria->apply($query);
	}

	/**
	 * @return \Illuminate\Database\Eloquent\Builder
	 */
	protected function newQuery()
	{
		return $this->model->newQuery();
	}

}