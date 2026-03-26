<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class News extends Model {
    protected $fillable = ['icon', 'category', 'title', 'date', 'featured', 'chip', 'excerpt', 'link_text'];
    protected $casts = ['featured' => 'boolean'];
}