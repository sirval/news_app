<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    public $table = "news_app_post";
    protected $primaryKey = 'id';
    use HasFactory;
}
