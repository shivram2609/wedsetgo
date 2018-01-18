<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmsemail extends Model
{
      protected $table = 'cmsemails';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['subject', 'emailform', 'content'];
}
