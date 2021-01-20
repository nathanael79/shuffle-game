<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Result extends Model
{
    use HasFactory;
    protected $table = 'results';
    protected $fillable = [
        'game_id',
        'word_id',
        'answer',
        'is_true',
        'point'
    ];

    public function game(){
        return $this->hasOne(Game::class, 'id','game_id');
    }

    public function word(){
        return $this->hasOne(Word::class, 'id','word_id');
    }
}
