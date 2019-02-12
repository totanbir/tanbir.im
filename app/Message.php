<?php

namespace App;

use App\Events\MessageSentEvent;
use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'message';

    public function setImageAttribute($value)
    {
        $gravatarImageHash=md5( strtolower( trim( $value ) ) );
        $this->attributes['image'] = 'http://www.gravatar.com/avatar/'.$gravatarImageHash;
    }

    protected $dispatchesEvents = [
    'created' => MessageSentEvent::class,
    ];
}
