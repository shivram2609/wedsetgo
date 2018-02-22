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
    protected $fillable = ['user_id', 'first_name', 'last_name', 'gender', 'profile_image', 'detail', 'phone_no','website', 'category_id','location_id', 'dob', 'address', 'trade_description', 'social_media'];


	public function user() {
		return $this->belongsTo(User::class);
	}
}
