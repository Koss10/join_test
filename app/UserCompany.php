<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class UserCompany extends Model
{
    protected $fillable =['company_id', 'user_id'];
    public $timestamps = false;
}
