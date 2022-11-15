<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;

class Post extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $with = ['user', 'comments'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setImgAttribute($img)
    {
        if ($this->img){
            Storage::disk('public')->delete($this->img);
        }
        return $this->attributes['img'] =  $img->store('posts', 'public');
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage').'/'.$this->img:null;
    }


}
