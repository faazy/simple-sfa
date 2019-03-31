<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Company extends Model
{
    protected $fillable = ['name', 'email', 'group_name', 'company', 'address', 'phone', 'deposit_amount'];
}
