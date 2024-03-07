<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Casts\Attribute;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Wallet extends Model
{
    protected $fillable = ['username','password','email','adhar','contact_number','balance'];
    use HasFactory;
    protected function username(): Attribute
    {
        return Attribute::make(
            set: fn (string $username) => (strtolower($username)),
        );
    }
    protected function password(): Attribute
    {
        return Attribute::make(
            set: fn (string $password) => password_hash($password,PASSWORD_BCRYPT),
        );
    }
}
