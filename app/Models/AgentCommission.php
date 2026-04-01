<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class AgentCommission extends Model
{
    use HasFactory;
    protected $fillable = [
        'agent_id',
        'project_id',
        'amount',
    ];

    public function agent()
    {
        return $this->belongsTo(User::class, 'agent_id');
    }
    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
