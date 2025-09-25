<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Conference;
use App\Models\Player;

class Team extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'conference_id', 'wins', 'losses'];

    // Relation inverse : une équipe appartient à une conférence
    public function conference()
    {
        return $this->belongsTo(Conference::class);
    }

    // Optionnel : joueurs
    public function players()
    {
        return $this->hasMany(Player::class);
    }
}
