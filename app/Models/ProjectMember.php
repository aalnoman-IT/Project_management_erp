<?php

namespace App\Models;
use App\Models\Member;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;

class ProjectMember extends Model
{
    use HasFactory;
    protected $fillable = [

        'project_id',

        'member_id',
   
    ];

   
    public function member(): BelongsTo
    {
        return $this->belongsTo(Member::class, 'member_id');
    }
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
