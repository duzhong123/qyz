<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Content extends Model
{
    protected $table="cate_content";
    protected $primaryKey="c_id";
    public $timestamps=false;
}
