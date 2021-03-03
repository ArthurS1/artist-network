<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\User;

class Post extends Model
{
    use HasFactory;

    public $timestamps = false;

    protected $appends = ['username'];

    protected $casts = [
        'created_at' => 'datetime:Y-m-d',
    ];

    public function getUsernameAttribute()
    {
        return $this->user->username;
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
