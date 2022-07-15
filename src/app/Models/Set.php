<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Set extends Model
{
    use HasFactory;

    protected $table = 'set';

    protected $fillable =
    [
      'set_title',
      'set_description',
      'category',
      'is_favourite',
      'creation_date',
    ];

    public function flashcards()
    {
        return $this->hasMany('App\Models\Flashcard');
    }

    public function owner()
    {
        return $this->hasOne('App\Models\User');
    }
}
