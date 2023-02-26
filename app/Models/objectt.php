<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class objectt extends Model
{
 
    use HasFactory;
    protected $table = 'objects';
    protected $fillable = ["object","user_id","event_id","project_id","animation","textobject","created_at","updated_at"];
}
