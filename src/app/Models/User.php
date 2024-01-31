<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ["username", "email", "password"];
    protected $hidden = ["password"];
    protected $casts = [
        "email_verified_at" => "datetime",
        "password" => "hashed",
    ];

    public function findForPassport($username)
    {
        return $this->where("username", $username)->first();
    }

    public function profile()
    {
        return $this->hasOne(Profile::class);
    }
}
