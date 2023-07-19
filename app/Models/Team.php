<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Team extends Model
{
    use HasFactory;

    public function Task()
    {
        return $this->hasMany(Task::class, 'team_id', 'id');
    }
    public function User()
    {
        return $this->hasMany(User::class, 'team_id', 'id');
    }
}
