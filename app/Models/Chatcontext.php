<?php

/**
 * Created by Reliese Model.
 */

namespace App\Models;

use Carbon\Carbon;
use Illuminate\Database\Eloquent\Model;

/**
 * Class Chatcontext
 * 
 * @property int $id
 * @property int $chatroomId
 * @property int $userId
 * @property string $context
 * @property int $messageType
 * @property int $status
 * @property Carbon $createdAt
 * @property Carbon $updatedAt
 * 
 * @property Chatroom $chatroom
 * @property User $user
 *
 * @package App\Models
 */
class Chatcontext extends Model
{
	protected $table = 'chatcontext';
	
	const CREATED_AT = 'createdAt';
	const UPDATED_AT = 'updatedAt';

	protected $casts = [
		'chatroomId' => 'int',
		'userId' => 'int',
		'messageType' => 'int',
		'status' => 'int',
		'createdAt' => 'datetime',
		'updatedAt' => 'datetime'
	];

	protected $fillable = [
		'chatroomId',
		'userId',
		'context',
		'messageType',
		'status',
		'createdAt',
		'updatedAt'
	];

	public function chatroom()
	{
		return $this->belongsTo(Chatroom::class, 'chatroomId');
	}

	public function user()
	{
		return $this->belongsTo(User::class, 'userId');
	}
}
