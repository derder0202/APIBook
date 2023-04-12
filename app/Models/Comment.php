<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @mixin Builder
 * */

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['_id','idBook','idUser','content','date'];
    protected $primaryKey = "_id";
    public $timestamps = false;
}
