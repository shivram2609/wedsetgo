<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class UserWork extends Model
	{
		protected $table = 'user_works';

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = ['user_id', 'catagory_id', 'description', 'title', 'tag','status','is_featured'];
		
		 public function userworkimage() {
			return $this->hasOne(UserWorkImage::class);
		}
		public function user() {
			return $this->belongsTo(User::class);
		}
		public function catagory() {
			return $this->belongsTo(Catagory::class);
		}
	}
