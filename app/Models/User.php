<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Builder;

/**
 * User
 * @mixin Eloquent
 * @mixin Builder
 */
class User extends Model
{
    use HasFactory;
    protected $fillable = ['username','email','password','fullName'];
    public $timestamps = false;
    protected $primaryKey = "username";
    public $incrementing = false;
}
