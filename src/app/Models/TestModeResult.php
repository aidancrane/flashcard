<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class TestModeResult extends Model
{
    use HasFactory;

    protected $table = 'test_result';

    protected $fillable = [
            'skipped_questions',
            'correct_answers',
            'incorrect_answers',
          ];

    public function set()
    {
        return $this->belongsTo('App\Models\Set', 'set_id');
    }

    public function user()
    {
        return $this->belongsTo('App\Models\User', 'owner_id');
    }
}
