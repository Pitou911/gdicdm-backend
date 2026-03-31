<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class CmsDocument extends Model {
    protected $table    = 'cms_documents';
    protected $fillable = ['type', 'title', 'language', 'file_url', 'cover_url', 'date', 'status'];
}