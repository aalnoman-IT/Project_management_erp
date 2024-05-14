<?php

namespace App\Models;
use App\Models\Task;
use App\Models\Project;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsTo;
class Expense extends Model
{
    use HasFactory;
    protected $fillable = [
'name',
'date',
'amount',
'project_id',
'task_id',
'subject',
'description',
'attachment'


];


public function task(): BelongsTo
{
return $this->belongsTo(Task::class, 'task_id');
}
public function project(): BelongsTo
{
return $this->belongsTo(Project::class, 'project_id');
}

}
