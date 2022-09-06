<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Album extends Model
{
    protected $fillable = ['user_id', 'name'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function album_images()
    {
        return $this->hasMany(Album_image::class);
    }

    public function scopeWhereUser($query, $user_id) {
        return $query->where('user_id', $user_id);
    }
}
