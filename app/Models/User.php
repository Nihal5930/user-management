<?php

namespace App\Models;

use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Notifications\Notifiable;
use App\Events\UserSaved;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $fillable = ['prefixname', 'firstname', 'middlename', 'lastname', 'email', 'photo'];

    public function details()
    {
        return $this->hasMany(Detail::class);
    }

    protected static function boot()
    {
        parent::boot();

        static::saved(function ($user) {
            event(new UserSaved($user));
        });
    }


}
