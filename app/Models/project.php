<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ["based_tybe","project_name","your_marker","your_object","user_id","created_at","updated_at"];
}
