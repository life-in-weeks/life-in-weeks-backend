<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserData extends Model
{
    use HasFactory;
    protected $guarded = ["date_of_birth"];

    public function userAuth()
    {
        return $this->belongsTo(UserAuth::class);
    }
}
