<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conference;
use App\Models\Player;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'conference_id', 'wins', 'losses', 'history', 'logo'];

    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
