<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;


    

    public function post()
    {
        return $this->belongsTo(Post::class);
    }

  
    // yorum yapan kişinin bilgilerini çekmek için
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    // yorum yapılan user bilgilerini çekmek için
  
    public function commentUser()
    {
        return $this->belongsTo(User::class,'comment_user_id');
    }

    // hangi posta 

    public function commentPost()
    {
        return $this->belongsTo(Post::class,'comment_post_id');
    }

    




}
