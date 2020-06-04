<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class User extends Model
{
    public $table = "users";
    public $connection = "mysql";
    public $primaryKey = "id";
    public $timestamps = false;
}
