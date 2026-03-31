<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CmsEducation extends Model {
    protected $table    = 'cms_education';
    protected $fillable = ['type', 'title', 'language', 'file_url', 'cover_url', 'date', 'status'];
}