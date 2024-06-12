<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Tag extends Model
{
    use HasFactory;

    public function news()
    {
        return $this->belongsToMany(News::class, 'tagsnews');
    }

    public function totalNews()
    {
        $tags = Tag::withCount('news')->get();
        return $tags;
    }

    protected $fillable = [
        'title',
        'description'
    ];
}
