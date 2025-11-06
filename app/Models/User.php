<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Collection;
use Illuminate\Notifications\Notifiable; // 最好也加上
use Illuminate\Database\Eloquent\Factories\HasFactory; // 最好也加上
use Laravel\Sanctum\HasApiTokens;

/**
 * Class User
 * 
 * @property int $id
 * @property string $loginId
 * @property string|null $nickname
 * @property int $role
 * @property string|null $headerimg
 * @property string $password
 * @property string|null $email
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 * 
 * @property Collection|Activitie[] $activities
 * @property Collection|Chatcontext[] $chatcontexts
 * @property Integral|null $integral
 * @property Collection|Registration[] $registrations
 *
 * @package App\Models
 */
class User extends Authenticatable
{
	use HasApiTokens, HasFactory, Notifiable;

	protected $table = 'user';

	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	protected $casts = [
		'role' => 'int',
		'createdAt' => 'datetime',
		'updatedAt' => 'datetime'
	];

	protected $hidden = [
		'password'
	];

	protected $fillable = [
		'loginId',
		'nickname',
		'role',
		'headerimg',
		'password',
		'email',
		'createdAt',
		'updatedAt'
	];

	public function activities()
	{
		return $this->hasMany(Activitie::class, 'createdPeople');
	}

	public function chatcontexts()
	{
		return $this->hasMany(Chatcontext::class, 'userId');
	}

	public function integral()
	{
		return $this->hasOne(Integral::class, 'userId');
	}

	public function registrations()
	{
		return $this->hasMany(Registration::class, 'userId');
	}
}
