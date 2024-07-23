<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Article extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'body',
        'image',
        'user_id',
    ];

    // Un article peut avoir plusieurs  commentaires
    public function comments(){
        return $this->hasMany(Comment::class);
    }
    // Un article n'a qu'un seul auteur (user)

    public function user(){
        return $this->belongsTo(User::class);
    }
}
