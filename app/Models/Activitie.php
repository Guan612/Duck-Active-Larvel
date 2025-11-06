<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Activitie
 * 
 * @property int $id
 * @property string $title
 * @property int $activitieType
 * @property string|null $content
 * @property string|null $activitieImgUrl
 * @property int $isOnline
 * @property string|null $activeAddress
 * @property int $activitiePeopleNum
 * @property int $remainingNum
 * @property int $activitStatus
 * @property int $createdPeople
 * @property int $point
 * @property Carbon $startDate
 * @property Carbon $endDate
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 * 
 * @property User $user
 * @property Collection|Chatroom[] $chatrooms
 * @property Collection|Registration[] $registrations
 *
 * @package App\Models
 */
class Activitie extends Model
{
	protected $table = 'activitie';

	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	protected $casts = [
		'activitieType' => 'int',
		'isOnline' => 'int',
		'activitiePeopleNum' => 'int',
		'remainingNum' => 'int',
		'activitStatus' => 'int',
		'createdPeople' => 'int',
		'point' => 'int',
		'startDate' => 'datetime',
		'endDate' => 'datetime',
		'createdAt' => 'datetime',
		'updatedAt' => 'datetime'
	];

	protected $fillable = [
		'title',
		'activitieType',
		'content',
		'activitieImgUrl',
		'isOnline',
		'activeAddress',
		'activitiePeopleNum',
		'remainingNum',
		'activitStatus',
		'createdPeople',
		'point',
		'startDate',
		'endDate',
		'createdAt',
		'updatedAt'
	];

	public function user()
	{
		return $this->belongsTo(User::class, 'createdPeople');
	}

	public function chatrooms()
	{
		return $this->hasMany(Chatroom::class, 'activitieId');
	}

	public function registrations()
	{
		return $this->hasMany(Registration::class, 'activitieId');
	}
}
