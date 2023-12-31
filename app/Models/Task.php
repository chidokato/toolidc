<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    public function Channel()
	{
	    return $this->hasOne(Channel::class, 'id', 'channel_id');
	}
	public function Project()
	{
	    return $this->hasOne(Project::class, 'id', 'project_id');
	}
	public function Supplier()
	{
	    return $this->hasOne(Supplier::class, 'id', 'supplier_id');
	}
	public function Team()
	{
	    return $this->hasOne(Team::class, 'id', 'team_id');
	}
	public function User()
	{
	    return $this->hasOne(User::class, 'id', 'u_id');
	}
}

