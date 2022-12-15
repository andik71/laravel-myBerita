<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ArticleModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $table = 'article';
    protected $fillable = [
        'title', 'content', 'photo', 'author_id', 'category_id'
    ];

    public function author()
    {
        return $this->belongsTo(AuthorModel::class);
    }
    public function category()
    {
        return $this->belongsTo(CategoryModel::class);
    }
}
