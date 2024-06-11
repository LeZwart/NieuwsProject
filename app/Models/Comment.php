<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;

    public function Newspost()
    {
        return $this->belongsTo(News::class);
    }

    public function Reviewer()
    {
        return $this->belongsTo(User::class);
    }

    protected $fillable = [
        'news_id',
        'reviewer_id',
        'message',
    ];
}
