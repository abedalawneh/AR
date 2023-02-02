<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class event extends Model
{
    
    
    use HasFactory;
    protected $table = 'events';
    protected $fillable = ["event_name","event_radius","object_id","location_id","created_at","updated_at"];

}
