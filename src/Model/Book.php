<?php
namespace Omoon\PhpConFukuoka16\Model;

use Illuminate\Database\Eloquent\Model;

class Book extends Model
{
    protected $fillable = [
        'name',
        'price',
        'author_id',
    ];

}