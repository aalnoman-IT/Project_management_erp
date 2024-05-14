<?php

namespace App\Models;
use App\Models\Member;
use App\Models\Project;
use App\Models\Milestone;
use App\Models\TaskStage;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Task extends Model
{
    use HasFactory;
    protected $fillable = [

    'name',
    'description',
    'estimated_hours',
    'start_date',
    'end_date',
    'member_id',
    'project_id',
    'milestone_id',
    'stage_id',
    'progress'
       
    ];

   
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
    public function milestone(): BelongsTo
    {
        return $this->belongsTo(Milestone::class, 'milestone_id');
    }
    
    public function taskstage(): BelongsTo
    {
        return $this->belongsTo(TaskStage::class, 'stage_id');
    }
}
