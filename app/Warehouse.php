<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Warehouse extends Model
{
    protected $table = 'warehouse';

    protected $fillable = ['code', 'name', 'city', 'phone', 'email', 'price_group_id'];

    public $timestamps = false;

    public function products()
    {

    }
}
