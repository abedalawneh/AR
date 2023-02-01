<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objectt extends Model
{
    public function project()
{
    return $this->belongsTo(project::class);
}
public function object()
{
    return $this->belongsTo(location::class);
}
    use HasFactory;
    protected $table = 'objects';
    protected $fillable = ["object","project_id","event_id","location_id","created_at","updated_at"];
}
