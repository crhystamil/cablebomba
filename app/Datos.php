<?php

namespace App;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Foundation\Auth\User as Authenticatable;

class Datos extends Authenticatable
{
    protected $table = "datos";
}
