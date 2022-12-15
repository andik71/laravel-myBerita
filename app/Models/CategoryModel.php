<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CategoryModel extends Model
{
    use HasFactory;
    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */

    protected $table = 'category';
    protected $fillable = [
        'category', 'tags',
    ];

    public function article()
    {
        return $this->hasMany(ArticleModel::class);
    }
}
