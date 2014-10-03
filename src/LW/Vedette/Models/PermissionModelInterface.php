<?php namespace LW\Vedette\Models;

interface PermissionModelInterface extends BaseModelInterface {

	/**
	 * @var string
	 */
	const ACCESS_INHERIT = 'INHERIT';

	/**
	 * @var string
	 */
	const ACCESS_GRANTED = 'GRANTED';

	/**
	 * @var string
	 */
	const ACCESS_DENY = 'DENY';

	/**
	 * @param string $value
	 */
	public function setAccess($value);

	/**
	 * @return string
	 */
	public function getAccess();

}