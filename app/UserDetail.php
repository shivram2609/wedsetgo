<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserDetail extends Model
{
   
    protected $table = 'user_details';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'profile_image'];


	public function user() {
		return $this->belongsTo(User::class);
	}
}
