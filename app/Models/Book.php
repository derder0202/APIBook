<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Book
 * @mixin Eloquent
 * @mixin Builder
 */

class Book extends Model
{
    protected $fillable = ['_id','name','description','author','year','mainImg','imgs'];
    protected $primaryKey = "_id";
    public $timestamps = false;
    use HasFactory;
}
