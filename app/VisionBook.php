<?php

	namespace App;

	use Illuminate\Database\Eloquent\Model;

	class VisionBook extends Model
	{
		protected $table = 'vision_books';

		/**
		 * The attributes that are mass assignable.
		 *
		 * @var array
		 */
		protected $fillable = ['user_id', 'vision_title', 'vision_description'];	
		 public function visionbookcollection() {
			return $this->hasOne(VisionBookCollection::class);
		}
		public function user() {
			return $this->belongsTo(User::class);
		}
	}
