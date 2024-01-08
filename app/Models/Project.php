<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
  
    use  HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'title',
        'user_id',
        'description',
        'number_of_student',
        'trimester',
        'year',
    ];


    public function users()
    {
        return $this->belongsToMany(User::class);
    }

    public function files()
    {
        return $this->hasMany(File::class);
    }

    //relation bw project and applications for projects
    public function projectApplications()
    {
        return $this->hasMany(ProjectApplication::class);
    }
}
