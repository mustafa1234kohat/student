<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Student extends Model
{
    protected $fillable = ['first_name','last_name','email','password','role','profile_photo_path','address'];
}
