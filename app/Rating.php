<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Rating extends Model
{
   
    protected $table = 'ratings';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['rating_points', 'professional_id', 'user_id', 'comment', 'status'];


	public function user() {
		return $this->belongsTo(User::class);
	}
}
