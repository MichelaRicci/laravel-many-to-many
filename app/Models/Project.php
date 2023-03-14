<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'content', 'image', 'github', 'slug'];

    // Relazione con i types
    public function type(){
        return $this->belongsTo(Type::class);
    }

    // Relazione con le technologies
    public function technology(){
        return $this->belongsToMany(Technology::class);
    }


}
