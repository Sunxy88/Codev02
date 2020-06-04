<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class ListUsers extends Model
{
    public $table = "listUsers";
    public $connection = "mysql";
    public $primaryKey = "id";
    public $timestamps = false;
}
