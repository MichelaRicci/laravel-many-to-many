<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Projects;

class Type extends Model
{
    use HasFactory;
    protected $fillable = ['label'];

    public function projects(){
        return $this->hasMany(Project::class);
    }
}
