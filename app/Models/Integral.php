<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

/**
 * Class Integral
 * 
 * @property int $id
 * @property int $userId
 * @property int $learnedPoints
 * @property int $actionPoints
 * @property int $beautyPoints
 * @property int $moralPoints
 * 
 * @property User $user
 *
 * @package App\Models
 */
class Integral extends Model
{
	protected $table = 'integral';
	public $timestamps = false;

	protected $casts = [
		'userId' => 'int',
		'learnedPoints' => 'int',
		'actionPoints' => 'int',
		'beautyPoints' => 'int',
		'moralPoints' => 'int'
	];

	protected $fillable = [
		'userId',
		'learnedPoints',
		'actionPoints',
		'beautyPoints',
		'moralPoints'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'userId');
	}
}
