<?php

namespace App\models;

use Illuminate\Database\Eloquent\Model;

class Album_image extends Model
{
    protected $fillable = ['album_id', 'image'];

    public function album()
    {
        return $this->belongsTo(Album::class);
    }
}
