<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class location extends Model
{
    public function object()
{
    return $this->hasMany(object::class);
}
    use HasFactory;
    protected $table = 'locations';
    protected $fillable = ["location","latitude","longitude","project_id","event_id ","object_id ","created_at","updated_at"];
}
