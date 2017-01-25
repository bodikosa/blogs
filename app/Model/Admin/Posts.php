<?php

namespace App\Model\Admin;
use Illuminate\Database\Eloquent\Model;

class Posts extends Model
{
    protected $fillable = ['title', 'text', 'text_short', 'link', 'image', 'created_at', 'updated_at'];
    protected $table = 'posts';
}
