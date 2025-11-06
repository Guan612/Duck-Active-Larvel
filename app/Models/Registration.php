<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Registration
 * 
 * @property int $id
 * @property int $userId
 * @property int $activitieId
 * @property int $status
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 * 
 * @property Activitie $activitie
 * @property User $user
 *
 * @package App\Models
 */
class Registration extends Model
{
	protected $table = 'registration';

	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	protected $casts = [
		'userId' => 'int',
		'activitieId' => 'int',
		'status' => 'int',
		'createdAt' => 'datetime',
		'updatedAt' => 'datetime'
	];

	protected $fillable = [
		'userId',
		'activitieId',
		'status',
		'createdAt',
		'updatedAt'
	];

	public function activitie()
	{
		return $this->belongsTo(Activitie::class, 'activitieId');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'userId');
	}
}
