<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Reseration extends Model
{
    protected $fillable = [
        'user_id', 'service_id',
    ];
}
