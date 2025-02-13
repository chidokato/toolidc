<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    protected $table = 'teams'; // Bảng nên để lowercase theo convention

    public function parent()
    {
        return $this->belongsTo(Team::class, 'parent', 'id')->withDefault();
    }

    public function children()
    {
        return $this->hasMany(Team::class, 'parent', 'id');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'team_id', 'id');
    }

    public function users()
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }
}
