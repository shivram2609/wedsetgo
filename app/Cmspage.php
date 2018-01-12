<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Cmspage extends Model
{
    / protected $table = 'cmspages';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['name', 'content', 'metatitle', 'seourl', 'metadesc', 'metakeyword', 'status'];
}
