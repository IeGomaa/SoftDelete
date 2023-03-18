<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = [
        'title',
        'author',
        'content',
        'image',
        'date'
    ];

    protected $dates = [
        'deleted_at'
    ];

    public function getImageAttribute($value): string
    {
        return 'uploaded/post/' . $value;
    }
}
