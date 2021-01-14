<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Project extends Model
{
    use HasFactory;

    protected $fillable = [
        'title',
        'description',
    ];

    public function projectArticles()
    {
        return $this->morphedByMany(ProjectArticle::class, 'projectable', 'project_has_contents');
    }

    public function projectUsers()
    {
        return $this->morphedByMany(ProjectUser::class, 'projectable', 'project_has_contents');
    }
}
