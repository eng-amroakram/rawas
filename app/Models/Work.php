<?php

namespace App\Models;

use App\Authorizable;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Work extends Model
{
    use HasFactory;
    use Authorizable;

    protected $fillable = [
        'title',
        'sub_title',
        'description',
        'image',
        'images',
        'project_id',
    ];

    protected $casts = [
        'images' => 'array',
    ];

    public function project()
    {
        return $this->belongsTo(Project::class, 'project_id', 'id');
    }
}
