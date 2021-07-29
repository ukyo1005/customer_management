<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Menu extends Model
{
    protected $fillable = ['id', 'menu_category_id', 'name'];
    public $timestamps = false;
}
