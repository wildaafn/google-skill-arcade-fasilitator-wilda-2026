<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class MutualProfile extends Model
{
    protected $fillable = ['type', 'username', 'link', 'is_verified'];
}
