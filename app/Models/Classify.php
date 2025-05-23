<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Classify extends Model
{
    use HasFactory;

    protected $table = 'classifys';

    public function tasks()
    {
        return $this->hasMany(Task::class, 'classify_id');
    }
}
