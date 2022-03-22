<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class NewsPost extends Model
{
    public $table = "news_app_post";
    protected $primaryKey = 'id';
    use HasFactory;
 /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'body',
        'public_id',
        'filepath',
        'user_id',
    ];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
