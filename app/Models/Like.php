<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Builder;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 *
 * @mixin Builder
 * */
class Like extends Model
{
    use HasFactory;
    protected $fillable = ['idBook','idUser','date'];
    protected $primaryKey = ['idBook','idUser'];
    public $timestamps = false;
    public $incrementing = false;
}
