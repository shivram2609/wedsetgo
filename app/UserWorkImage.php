<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserWorkImage extends Model
{
    protected $table = 'user_work_images';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['user_work_id', 'images'];
    
    public function userwokr() {
		return $this->belongsTo(UserWork::class);
	}
}
