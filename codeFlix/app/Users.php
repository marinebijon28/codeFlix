<?php
namespace App;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Users extends Authenticatable implements MustVerifyEmail
{
    use Notifiable;

    protected $fillable = ['email', 'password', 'confirmed_email'];
}
