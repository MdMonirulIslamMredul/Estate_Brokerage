<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProjectSubcategory extends Model
{
    use HasFactory;

    protected $fillable = ['project_category_id', 'name', 'slug', 'description', 'image', 'status'];

    public function category()
    {
        return $this->belongsTo(ProjectCategory::class, 'project_category_id');
    }
}
