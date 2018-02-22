<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Message extends Model
{
    protected $table = 'messages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sender_id','receiver_id', 'last_message', 'message_count', 'is_new'];
    
    public function conversations()
    {
        return $this->hasMany('App\MessageConversation');
    }
    
}
