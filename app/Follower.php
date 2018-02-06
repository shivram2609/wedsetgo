<?php	

namespace App;

use Illuminate\Database\Eloquent\Model;

class Follower extends Model
{
    protected $table = 'followers';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = ['buyer_id','professional_id', 'status'];
}
