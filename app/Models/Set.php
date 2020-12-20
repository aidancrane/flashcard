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
      'category',
      'is_favourite',
      'creation_date',
    ];


    public function owner()
    {
        return $this->hasOne('App\Models\User');
    }
}
