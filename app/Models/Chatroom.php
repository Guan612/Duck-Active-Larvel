<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Illuminate\Database\Eloquent\Collection;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chatroom
 * 
 * @property int $id
 * @property int $activitieId
 * 
 * @property Activitie $activitie
 * @property Collection|Chatcontext[] $chatcontexts
 *
 * @package App\Models
 */
class Chatroom extends Model
{
	protected $table = 'chatroom';
	public $timestamps = false;

	protected $casts = [
		'activitieId' => 'int'
	];

	protected $fillable = [
		'activitieId'
	];

	public function activitie()
	{
		return $this->belongsTo(Activitie::class, 'activitieId');
	}

	public function chatcontexts()
	{
		return $this->hasMany(Chatcontext::class, 'chatroomId');
	}
}
