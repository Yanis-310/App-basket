<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Team; // facultatif mais clair

class Conference extends Model
{
    use HasFactory;

    protected $fillable = ['name'];

    // Relation : une conférence a plusieurs équipes
    public function teams()
    {
        return $this->hasMany(Team::class);
    }
}
