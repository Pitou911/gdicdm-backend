<?php
namespace App\Models;
use Illuminate\Database\Eloquent\Model;

class Upload extends Model {
    protected $fillable = ['title', 'type', 'section', 'language', 'status', 'date', 'file_url'];
}