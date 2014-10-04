<?php namespace LW\Vedette\Models;

use Illuminate\Auth\UserTrait;
use Illuminate\Auth\UserInterface;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Auth\Reminders\RemindableTrait;

class IlluminateUserModel extends Model implements UserInterface, UserModelInterface {

	use UserTrait, RemindableTrait;

	/**
	 * The table associated with the model.
	 *
	 * @var string
	 */
	protected $table = 'users';

}