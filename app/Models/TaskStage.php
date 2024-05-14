<?php

namespace App\Models;
use App\Models\Project;


use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class TaskStage extends Model
{
    use HasFactory;
    protected $fillable = [

        'name',

        'complete',

        'project_id',



       
    ];

   
    public function project(): BelongsTo
    {
        return $this->belongsTo(Project::class, 'project_id');
    }
}
