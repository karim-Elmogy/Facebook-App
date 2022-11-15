<?php

namespace App\Models;

use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Hash;
use Illuminate\Support\Facades\Storage;
use Laravel\Sanctum\HasApiTokens;

class User extends Authenticatable
{
    use HasApiTokens, HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var string[]
     */
    protected $fillable = [
        'name',
        'email',
        'password',
        'img'
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * The attributes that should be cast.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    public function posts()
    {
        return $this->hasMany(Post::class);
    }

    public function comments()
    {
        return $this->hasMany(Comment::class);
    }

    public function setPasswordAttribute($password)
    {
        return $this->attributes['password'] = Hash::make($password);
    }

    public function setImgAttribute($img)
    {
        if ($this->img){
            Storage::disk('public')->delete($this->img);
        }
        return $this->attributes['img'] =  $img->store('users', 'public');
    }

    public function getImageAttribute()
    {
        return $this->img?url('storage').'/'.$this->img:asset('assets/index/user.png');
    }

    public function scopeWithoutMe($query)
    {
        return $query->where('id', '!=', auth()->id());
    }

    public function scopeFriends($query)
    {
        return $query->whereHas('senders', function($q){
            $q->whereAccept(1)->where('user_id', auth()->id());
        })->orWhereHas('sendRequest', function($q){
            $q->whereAccept(1)->whereSenderId(auth()->id());
        })->withoutMe();
    }

    public function scopeSendRequests($query)
    {
        return $query->whereHas('sendRequest', function($q){
            $q->whereAccept(0)->whereSenderId(auth()->id());
        });
    }

    public function scopeFriendsRequest($query)
    {
        return $query->whereHas('senders', function($q){
            $q->whereAccept(0)->Where('user_id',auth()->id());
        });
    }

    public function senders()
    {
        return $this->hasMany(FriendRequest::class, 'sender_id');
    }

    public function sendRequest()
    {
        return $this->hasMany(FriendRequest::class, 'user_id');
    }


}
