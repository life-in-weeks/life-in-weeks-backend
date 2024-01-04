<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Laravel\Passport\HasApiTokens;

class UserAuth extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    protected $fillable = ["username", "email", "password"];
    protected $table = "user_auth";
    protected $hidden = ["password"];
    protected $casts = [
        "email_verified_at" => "datetime",
        "password" => "hashed",
    ];

    public function findForPassport($username)
    {
        return $this->where("username", $username)->first();
    }

    public function userData()
    {
        return $this->hasOne(UserData::class);
    }
}
