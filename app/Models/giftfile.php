<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class giftfile extends Model
{
    use HasFactory;
    protected $table = 'giftfiles';
    protected $fillable = ["object","user_id","file_data","project_id","created_at","updated_at"];
}
