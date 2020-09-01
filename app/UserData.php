<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
   
    public $timestamps = true;
      /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'mobile_number','email_id','company','designation'
    ];
}
