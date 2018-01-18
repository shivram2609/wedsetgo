<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Sliderimage extends Model
{
	protected $table = 'slider_images';
    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['image', 'is_active', 'heading', 'description'];
}
