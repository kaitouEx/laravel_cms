<?php

namespace App;

use Illuminate\Notifications\Notifiable;
use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Foundation\Auth\User as Authenticatable;

class User extends Authenticatable
{
    use Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array
     */
    protected $fillable = [
        'name', 'email', 'password',
    ];

    /**
     * The attributes that should be hidden for arrays.
     *
     * @var array
     */
    protected $hidden = [
        'password', 'remember_token',
    ];

    /**
     * The attributes that should be cast to native types.
     *
     * @var array
     */
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];

    //どのユーザが書いた記事か
    //使うにはユーザIDが必要
    public function articles(){
        return $this->hasMany(Article::class); //select * from articles where user_id = 現在のユーザのインスタンス
    }
    public function projects(){
        return $this->hasMany(Project::class);//select * from projects where user_id = 現在のユーザのインスタンス
    }
}

// $user = User::find(1); // select * from user where id =1
// $user->projects; // select * from projects where id = $user->id
// $user->projects->first()/last()/find($id)/splid(3)/groupby  //Eloquentコレクションが必要