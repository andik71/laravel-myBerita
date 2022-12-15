<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AuthorModel extends Model
{
   use HasFactory;
   /**
    * The attributes that are mass assignable.
    *
    * @var array<int, string>
    */

   protected $table = 'author';
   protected $fillable = [
      'name', 'gender', 'email'
   ];

   public function article()
   {
      return $this->hasMany(ArticleModel::class);
   }
}
