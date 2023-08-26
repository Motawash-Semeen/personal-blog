<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $table ='posts';
    protected $primaryKey = 'id';

    public function user()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function comment()
    {
        return $this->hasMany(Comment::class, 'post_id', 'id');
    }
    public function category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
}
