<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class project extends Model
{
    public function object()
{
    return $this->hasMany(object::class);
}
    use HasFactory;
    protected $table = 'projects';
    protected $fillable = ["based_tybe","project_name","your_marker","user_id","created_at","updated_at"];
}
