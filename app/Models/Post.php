<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'post_title',
        'post_content',
        'post_intro',
    ];

    public function categories()
    {
        return $this->belongsToMany(Category::class);
    }

}
