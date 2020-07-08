<?php

namespace App\models\index;

use Illuminate\Database\Eloquent\Model;

class Login extends Model
{
    protected $table="login";
    protected $primaryKey="u_id";
    public $timestamps=false;
}
