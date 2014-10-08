<?php namespace LW\Vedette\Repositories;

interface BaseRepositoryInterface {

	/**
	 * @param \LW\Vedette\Repositories\Criteria\CriteriaInterface $criteria
	 * @return \LW\Vedette\Models\BaseModelInterface[]
	 */
	public function getByCrtieria(Crtieria\CrtieriaInterface $criteria);

	/**
	 * @param \LW\Vedette\Repositories\Criteria\CriteriaInterface $criteria
	 * @return \LW\Vedette\Models\BaseModelInterface
	 */
	public function findByCrtieria(Crtieria\CrtieriaInterface $criteria);

}