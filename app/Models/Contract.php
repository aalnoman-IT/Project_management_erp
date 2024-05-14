<?php

namespace App\Models;
use App\Models\Member;
use App\Models\Project;
use App\Models\Milestone;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class Contract extends Model
{
    use HasFactory;
    protected $fillable = [

        'project_id',
        'member_id',
        'subject',
        'value',
        'milestone_id',
        'start_date',
        'end_date',
        'notes'

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
}



