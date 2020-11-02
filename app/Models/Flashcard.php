<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flashcard extends Model
{
    protected $table = 'flashcard';

    protected $fillable =
  [
    'front_text',
    'back_text',
  ];
}
