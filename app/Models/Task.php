<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Task extends Model
{
    use HasFactory;

    // protected $table = 'tasks';
    protected $fillable = [
        'user_id', 'u_id', 'team_id', 'san_id', 'cty_id', 
        'project_id', 'channel_id', 'supplier_id', 'expected_costs', 
        'support_rate', 'confirm', 'actual_costs', 'date_start', 'date_end'
    ];

    public function channel()
    {
        return $this->belongsTo(Channel::class, 'channel_id');
    }
	public function Project()
	{
	    return $this->hasOne(Project::class, 'id', 'project_id');
	}
	public function Supplier()
	{
	    return $this->hasOne(Supplier::class, 'id', 'supplier_id');
	}
	public function team()
    {
        return $this->belongsTo(Team::class, 'team_id');
    }
    public function floor()
    {
        return $this->belongsTo(Team::class, 'san_id');
    }
    public function company()
    {
        return $this->belongsTo(Team::class, 'cty_id');
    }
	public function User()
	{
	    return $this->hasOne(User::class, 'id', 'u_id');
	}
}

