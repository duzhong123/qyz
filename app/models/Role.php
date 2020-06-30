<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    protected $table="admin_role";
    protected $primaryKey="r_id";
    public $timestamps=false;
}
