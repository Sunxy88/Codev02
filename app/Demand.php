<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Demand extends Model
{
    public $table = "demands";
    public $connection = "mysql";
    public $primaryKey = "id";
    public $timestamps = false;
}
