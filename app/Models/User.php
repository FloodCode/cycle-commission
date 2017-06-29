<?php

namespace App\Models;

use Illuminate\Notifications\Notifiable;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    protected $table = 'users';

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    public function hasAdminAccess()
    {
        return $this->isAdmin();
    }

    public function hasCommissionAccess()
    {
        return $this->isCommission() || $this->hasAdminAccess();
    }

    public function isAdmin()
    {
        return (int)$this->role === \App\Core\UserRole::ADMIN;
    }

    public function isCommission()
    {
        return (int)$this->role === \App\Core\UserRole::COMMISSION;
    }
}
