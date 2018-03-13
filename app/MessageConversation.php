<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class MessageConversation extends Model
{
    protected $table = 'message_conversations';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['sender_id','message_id', 'message', 'is_new', 'receiver_id'];
}
