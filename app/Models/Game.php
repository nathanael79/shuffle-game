<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Game extends Model
{
    use HasFactory;

    protected $table = 'games';
    protected $fillable = [
        'user_id',
        'total_point'
    ];

    public function result(){
        return $this->hasMany(Result::class, 'game_id','id');
    }
}
