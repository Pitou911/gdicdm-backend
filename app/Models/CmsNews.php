<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CmsNews extends Model {
    protected $table    = 'cms_news';
    protected $fillable = ['category', 'title', 'description', 'image_url', 'cover_url', 'date', 'status'];
}