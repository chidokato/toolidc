<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Channel extends Model
{
    use HasFactory;

    protected $table = 'channels';

    public function parent()
    {
        return $this->belongsTo(Channel::class, 'parent');
    }

    public function children()
    {
        return $this->hasMany(Channel::class, 'parent');
    }

    public function tasks()
    {
        return $this->hasMany(Task::class, 'channel_id');
    }
}
