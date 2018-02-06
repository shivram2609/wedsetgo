<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class VisionBookCollection extends Model
{
    protected $table = 'vision_book_collections';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['vision_book_id', 'images', 'old_title', 'old_description', 'comments', 'user_work_id'];
    
    public function visionbook() {
		return $this->belongsTo(VisionBook::class);
	}
    public function userwork() {
		return $this->belongsTo(UserWork::class);
	}
}
