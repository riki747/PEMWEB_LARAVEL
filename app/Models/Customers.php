<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Notifications\Notifiable;


use Illuminate\Foundation\Auth\User as Authenticatable;

class Customers extends Authenticatable
{

    use Notifiable;
    protected $fillable = [
        'name',
        'email',
        'address',
        'password',
    ];
    protected $hidden = [
        'password',
        'remember_token',
    ];
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    public function initials()
    {
        $names = explode(' ', $this->name); // asumsi kolom 'name' ada
        $initials = '';

        foreach ($names as $n) {
            $initials .= strtoupper($n[0]);
        }

        return $initials;
    }
}
