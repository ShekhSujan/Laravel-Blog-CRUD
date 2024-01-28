<?php

namespace App\Models;

use App\Models\Blog;
use App\Models\BaseModel;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Concerns\HasUuids;
use Illuminate\Database\Eloquent\Relations\HasMany;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category extends BaseModel
{
    use HasFactory, SoftDeletes, HasUuids;
    protected $table = 'categories';
    protected $fillable = [
        'title',
        'slug',
        'meta',
        'image',
        'status',
    ];


    public function blog()
    {
        return $this->hasMany(Blog::class, 'category_id', 'id');
    }
    // protected $appends = ['category_url'];

    // public function getCategoryUrlAttribute()
    // {
    //     return route('category', ['slug' => $this->slug]);
    // }
}
